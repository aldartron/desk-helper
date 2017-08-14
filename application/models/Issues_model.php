<?php

class Issues_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model('users_model');
        $this->load->model('messages_model');
    }

    public function create_issue($image = NULL)
    {
        $date = date('Y-m-d H:i:s');
        $user_login = $_SESSION['user']->login;
        $data = array(
            'short_info' => $this->input->post('description'),
            'info' => $this->input->post('info'),
            'image' => $image,
            'publicated' => date('Y-m-d H:i:s'),
            'edited' => date('Y-m-d H:i:s'),
            'user_id' => $user_login,
            'admin_id' => $this->input->post('adminSelect'),
            'status_id' => 1,
            'hash' => base_convert(
                crc32(preg_replace("/[^0-9]/", '',$date).$user_login),
                10,
                36
            )
        );

        return $this->db->insert('issues', $data);
    }

    public function get_issue($id)
    {
        $query = $this->db->query(
            "SELECT *, issues.image, issues.info AS 'issueInfo', issues.id AS 'issueID', issues.status_id AS 'statusID', statuses.name AS 'status', statuses.info AS 'status_info' 
            FROM issues LEFT JOIN statuses ON issues.status_id = statuses.id
            WHERE issues.id = $id"
        );

        return $query->result_array()[0];
    }

    public function get_issues($status = NULL, $from)
    {
        $sql = 'SELECT *, users.info AS "userInfo", users.name AS "userName", users.surename AS "userSurename", issues.image, issues.info AS "issueInfo", issues.id AS "issueID", issues.status_id AS "statusID", statuses.name AS "status", statuses.info AS "status_info" 
            FROM issues LEFT JOIN statuses ON issues.status_id = statuses.id
             INNER JOIN users ON issues.user_id = users.login';

        if (!$_SESSION['user']->is_admin)
            $sql .= ' WHERE user_id = "'.$_SESSION['user']->login.'"';
        else
            $sql .= ' WHERE admin_id = "'.$_SESSION['user']->login.'"';

        if ($status != NULL) $sql .= " AND issues.status_id = $status";

        $sql .= " ORDER BY issues.edited DESC";
        $sql .= " LIMIT $from, 20";

        return $this->db->query($sql)->result_array();
    }

    public function get_count($statusID = NULL)
    {
        $query = $this->db->query("SELECT COUNT(id) AS 'count' FROM issues".($statusID == NULL ? '' : " WHERE status_id = $statusID"));
        return $query->result_array()[0]['count'];
    }

    public function get_my_last_id()
    {
        $query = $this->db->query(
            "SELECT id, hash FROM issues WHERE ".($_SESSION['user']->is_admin ? "admin_id" : "user_id")." = '".$_SESSION['user']->login."' ORDER BY publicated DESC LIMIT 1"
        );
        return $query->result_array()[0];
    }

    public function get_issues_by_search($input, $from)
    {
        $sql = 'SELECT issues.hash, issues.admin_id, issues.publicated, issues.edited, issues.short_info, issues.info AS "issueInfo",
                issues.id AS "issueID", issues.status_id AS "statusID", statuses.name AS "status",
                statuses.info AS "status_info" 
                FROM issues 
                LEFT JOIN statuses ON issues.status_id = statuses.id';

            // Админ или юзер
             if (!$_SESSION['user']->is_admin)
                 $sql .= ' WHERE user_id = "'.$_SESSION['user']->login.'"';
             else
                 $sql .= ' WHERE admin_id = "'.$_SESSION['user']->login.'"';


        // Поиск по строке
        $sql .= ' AND LOWER(CONCAT(issues.hash, issues.short_info, issues.info)) LIKE "%'.strtolower($input['str']).'%"';
        // Выбор администратора
        if (!empty($input['admin'])) $sql .= ' AND issues.admin_id = "'.$input['admin'].'"';
        // Выбранные статусы
        if (!empty($input['statuses'])) {
            $sql .= ' AND issues.status_id IN (';
            foreach ($input['statuses'] AS $status)
                $sql .= $status.', ';
            $sql = rtrim($sql, ', ');
            $sql .= ')';
        }
        // Сортировка
        $sql .= " ORDER BY issues.".($input['sort'] == 'short_info' ? strtolower($input['sort']) : $input['sort'])." ".(isset($_SESSION['desc']) ? 'DESC ' : '')."LIMIT $from, 20";

        return $this->db->query($sql)->result_array();
    }

}