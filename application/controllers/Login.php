<?php

class Login extends My_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('url_helper');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Вход';
        $data['error'] = '';

        $rules = array('trim', 'required', 'min_length[8]', 'max_length[20]');
        $this->form_validation->set_rules('login', 'Логин', $rules);
        $this->form_validation->set_rules('password', 'Пароль', $rules);

        if ($this->form_validation->run() === FALSE and !empty($_POST))
        {
            $data['error'] = 'input';
            $this->load->view('templates/head', $data);
            $this->load->view('login', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $dbconnect = $this->load->database();
            $this->db->where('login', $this->input->post('login'));
            $this->db->where('password', md5($this->input->post('password')));
            $result = $this->db->get('users');

            if ($result->num_rows() === 1)
            {
                $this->login($result->result()[0]);

                // Compose the page
                redirect('userpanel');
            }
            else
            {
                if (!empty($_POST))
                    $data['error'] = 'login';
                $this->load->view('templates/head', $data);
                $this->load->view('login', $data);
                $this->load->view('templates/footer');
            }
        }
    }

    private function login($user)
    {
        $_SESSION['user'] = $user;
    }

    public function logout()
    {
        session_destroy();
        redirect('login', 'refresh');
    }
}