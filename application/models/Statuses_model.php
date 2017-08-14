<?php

class Statuses_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_status($id)
    {
        return $this->db->get_where('statuses', array('id' => $id))->result_array()[0];
    }

    public function get_statuses()
    {
        return $this->db->get('statuses')->result_array();
    }

    public function change_status($issueID, $newStatusID)
    {
        $this->db->query(
            'UPDATE issues SET status_id = '.$newStatusID.'
             WHERE issues.id = '.$issueID
        );
    }

}