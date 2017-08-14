<?php

class Issues extends My_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('users_model');
        $this->load->model('issues_model');
        $this->load->model('messages_model');
        $this->load->helper('form');
    }

    public function new_issue($message = NULL)
    {
        $data['title'] = 'Новая заявка';
        $data['user'] = $this->users_model->get_user($_SESSION['user']->login);
        $data['admins'] = $this->users_model->get_admins( $data['user']['orgID']);
        $data['messages'] = $message;

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar', $data);
        $this->load->view('users/newissue', $data);
        $this->load->view('templates/footer', $data);
        echo $message;
    }

    public function create_issue()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Краткое описание', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->new_issue('Ошибка ввода');
        } else {
            if (isset($_FILES['screenshot']) && $_FILES['screenshot']['size'] > 0) {
                // Init upload
                $this->load->library('upload', array(
                    'file_name' => $_SESSION['user']->login.'-'.time(),
                    'upload_path' => './uploads',
                    'allowed_types' => 'gif|jpg|png',
                    'max_size' => 2048,
                    'max_width' => 1920,
                    'max_height' => 1080,
                ));

                if (!$this->upload->do_upload("screenshot")) {
//                    $this->new_issue($this->upload->display_errors());
                    $this->new_issue('Неправильное изображение');
                } else {
                    $this->issues_model->create_issue($this->upload->data()['file_name']);
                    $this->create_sys_message_created();

                    redirect(site_url('issues/'.$this->issues_model->get_my_last_id()['id']));
                }
            } else {
                $this->issues_model->create_issue();
                $this->create_sys_message_created();


                redirect(site_url('issues/'.$this->issues_model->get_my_last_id()['id']));
            }

        }
    }

    public function issue($id)
    {
        $this->load->library('buttons');

        $data['issue'] = $this->issues_model->get_issue($id);
        $data['title'] = "Заявка ".$data['issue']['hash'];
        $data['user'] = $this->users_model->get_user($_SESSION['user']->login);
        $data['admins'] = $this->users_model->get_admins($data['user']['orgID']);
        $data['messages'] = $this->messages_model->get_messages($id);
        $data['buttons'] = $this->buttons->get_buttons($data['issue']);

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/leftbar', $data);
        $this->load->view('users/issue', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create_message($issueID)
    {
        $user = $_SESSION['user'];

        $this->messages_model->create_message($issueID, $user);
        redirect('issues/'.$issueID);
    }

    private function create_sys_message_created()
    {
        $lastIssue = $this->issues_model->get_my_last_id();
        $this->messages_model->create_sys_message(
            $lastIssue['id'],
            'list-group-item-warning',
            'Заявка зарегистрирована под идентификатором <strong>' . $lastIssue['hash'] . '</strong>'
        );
    }

}