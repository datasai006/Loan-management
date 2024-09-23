<?php
class Borrower_model extends CI_Model {

    public function get_all_borrowers() {
        return $this->db->get('tbl_borrower')->result_array();
    }

    public function insert_borrower($data) {
        return $this->db->insert('tbl_borrower', $data);
    }

    public function get_borrower_by_id($id) {
        return $this->db->get_where('tbl_borrower', array('id' => $id))->row_array();
    }

    public function update_borrower($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_borrower', $data);
    }

    public function delete_borrower($id) {
        return $this->db->delete('tbl_borrower', array('id' => $id));
    }
}