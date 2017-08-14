<?php

class Messages_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model('issues_model');
        $this->load->model('users_model');
    }

    public function create_message($issueID, $user)
    {
        $data = array(
            'is_admin' => $user->is_admin,
            'issue_id' => $issueID,
            'publicated' => date('Y-m-d H:i:s'),
            'is_system' => 0,
            'text' => $this->input->post('newMessage'),
            'style' => ($user->is_admin ? 'list-group-item-info' : '')
        );
        $this->update_issue($issueID);
        return $this->db->insert('messages', $data);
    }

    public function create_sys_message($issueID, $style, $text)
    {
        $data = array(
            'issue_id' => $issueID,
            'publicated' => date('Y-m-d H:i:s'),
            'is_system' => 1,
            'text' => $text,
            'style' => $style
        );
        $this->update_issue($issueID);
        return $this->db->insert('messages', $data);
    }

    public function get_messages($issueID)
    {
        $query = $this->db->query(
            "SELECT messages.publicated, users.login, messages.is_admin, style, text, users.name, admins.name AS 'admin', users.login, is_system FROM messages 
            INNER JOIN issues ON issues.id = messages.issue_id
            INNER JOIN users ON issues.user_id = users.login
            INNER JOIN users AS admins ON admins.login = issues.admin_id 
            WHERE issue_id = '$issueID' ORDER BY messages.publicated"
        );

        return $query->result_array();
    }

    private function update_issue($id)
    {
        $this->db->where('id', $id);
        $this->db->update('issues', array('edited' => date('Y-m-d H:i:s')));
    }
}