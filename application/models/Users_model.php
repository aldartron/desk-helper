<?php

class Users_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_user($login)
    {
        $query = $this->db->query(
             'SELECT users.name AS "name", users.is_admin, surename, login, users.info AS "user_info", 
                is_admin, phone, email, organization_id AS "orgID", organizations.name AS "organization", organizations.address AS "address", organizations.info AS "about"
              FROM users
              LEFT JOIN organizations 
              ON users.organization_id = organizations.id
              WHERE login = "'.$login.'"'
        );
        return $query->result_array()[0];
    }

    public function get_users_by_admin($adminId)
    {
        $query = $this->db->query("
            SELECT users.name, surename, login, users.info FROM users 
            LEFT JOIN issues ON users.login = issues.user_id 
            WHERE issues.admin_id = '".$adminId."' 
            GROUP BY users.login"
        );
        return $query->result_array();
    }

    public function get_admins_by_org($orgID)
    {
        $query = $this->db->get_where('users', array('organization_id' => $orgID, 'is_admin' => 1));
        return $query->result_array();
    }


    public function set_users()
    {
        $data = array(
            'login' => $this->input->post('login'),
            'name' => $this->input->post('name'),
            'surename' => $this->input->post('surename'),
            'password' => $this->input->post('pass')
        );

        return $this->db->insert('users', $data);
    }
}