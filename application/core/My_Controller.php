<?php

class My_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if (!isset($_SESSION['user']) and uri_string() != 'login' and uri_string() != '') {
            redirect(site_url('login'));
        }
    }

}