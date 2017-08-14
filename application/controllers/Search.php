<?php

class Search extends My_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('issues_model');
        $this->load->model('users_model');
        $this->load->model('statuses_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index($from = 0)
    {
        $statuses = array();
        for ($i = 1; $i <= 5; $i++) {
            if ($this->input->post("$i") != NULL)
                $statuses[] = $i;
        }

        $input = array(
            'str' => $this->input->post('str'),
            'admin' => $this->input->post('admin'),
            'sort' => empty($this->input->post('sort')) ? 'edited' : $this->input->post('sort'),
            'statuses' => $statuses
        );

        $data['issues'] = $this->issues_model->get_issues_by_search($input, $from);
        $data['user'] = $this->users_model->get_user($_SESSION['user']->login);
        $data['users'] = $this->users_model->get_users_by_admin($_SESSION['user']->login);
        $data['admins'] = $this->users_model->get_admins($data['user']['orgID']);
        $data['statuses'] = $this->statuses_model->get_statuses();
        $data['title'] = 'Поиск';
        $data['input'] = $input;

        // Compose the page
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/leftbar', $data);
        $this->load->view('users/search', $data);
        $this->load->view('templates/footer', $data);
    }

}