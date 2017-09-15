<?php

class Statuses extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('issues_model');
        $this->load->model('statuses_model');
        $this->load->model('messages_model');
        $this->load->helper('url');
    }

    public function change($issueID, $statusID) {

        $allow = FALSE;
        $issue = $this->issues_model->get_issue($issueID);
        $isAdmin = $_SESSION['user']->is_admin;
        $currentStatusID = $issue['statusID'];

        if (!$isAdmin) {

            if (
                ($currentStatusID == 1 and $statusID == 5) or
                ($currentStatusID == 2 and $statusID == 1) or
                ($currentStatusID == 4 and $statusID == 3) or
                ($currentStatusID == 4 and $statusID == 2)
            ) $allow = TRUE;

        } else if (
            ($currentStatusID == 1 and $statusID == 2) or
            ($currentStatusID == 2 and $statusID == 4) or
            ($currentStatusID == 2 and $statusID == 1) or
            ($currentStatusID == 4 and $statusID == 2)
        ) $allow = TRUE;

        if (!$allow) show_404();
        else {
            $this->statuses_model->change_status($issueID, $statusID);

            $style = '';
            if ($statusID == 1) $style = 'list-group-item';
            else if ($statusID == 2) $style = 'list-group-item-info';
            else if ($statusID == 3) $style = 'list-group-item-success';
            else if ($statusID == 4) $style = 'list-group-item-warning';
            else if ($statusID == 5) $style = 'list-group-item-danger';
            $author = ($_SESSION['user']->is_admin) ? 'Администратор' : 'Пользователь';
            $text = $author.' изменил cтатус заявки. Текущий статус: <strong>'.$this->statuses_model->get_status($statusID)['name'].'</strong>';

            $this->messages_model->create_sys_message($issueID, $style, $text);

            redirect(site_url('issues/'.$issueID));
        }
    }
}