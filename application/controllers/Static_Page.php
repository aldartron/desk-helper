<?php

class Static_Page extends My_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('users_model'));
    }

    public function contacts()
    {
        $data['title'] = 'Контакты';
        $data['user'] = $this->users_model->get_user($_SESSION['user']->login);
        $data['admins'] = $this->users_model->get_admins($data['user']['orgID']);

        // Compose the page
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/leftbar', $data);
        $this->load->view('pages/contacts', $data);
        $this->load->view('templates/footer', $data);
    }

    public function help()
    {
        $data['title'] = "Справка";
        $data['user'] = $this->users_model->get_user($_SESSION['user']->login);
        $data['admins'] = $this->users_model->get_admins($data['user']['orgID']);

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar', $data);
        $this->load->view('pages/help');
        $this->load->view('templates/footer');
    }

}