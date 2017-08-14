<?php

class Admin extends My_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function panel()
    {
        $data['title'] = 'MYTITLE';

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('masters/panel', $data);
        $this->load->view('templates/footer', $data);
    }

}