<?php

class Userpanel extends My_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('statuses_model');
        $this->load->model('issues_model');;
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index($from = 0)
    {
        $statusID = $this->input->get('status');
        $data['issues'] = $this->issues_model->get_issues($statusID, $from);
        $data['user'] = $this->users_model->get_user($_SESSION['user']->login);
        $data['admins'] = $this->users_model->get_admins($data['user']['orgID']);
        $data['statuses'] = $this->statuses_model->get_statuses();
        $data['status'] = $statusID;
        $data['title'] = 'DeskHelper';

        // Pagination
        $this->pagination->initialize(array(
            'base_url' => site_url('userpanel'),
            'total_rows' => $this->issues_model->get_count($statusID),
            'per_page' => 20,
            'next_link' => 'Вперед',
            'next_tag_open' => '<span class="page-link">',
            'next_tag_close' => '</span>',
            'prev_link' => 'Назад',
            'prev_tag_open' => '<span class="page-link">',
            'prev_tag_close' => '</span>',
            'full_tag_open' => "<nav><ul class='pagination justify-content-center'>",
            'full_tag_close' => '</ul>',
            'num_tag_open' => '<li class="page-item"><span class="page-link">',
            'num_tag_close' => '</span></li>',
            'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
            'cur_tag_close' => '</span></li>',
        ));

        $data['paginator'] = $this->pagination;

        // Compose the page
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/leftbar', $data);
        $this->load->view('users/userpanel', $data);
        $this->load->view('templates/footer', $data);
    }


}