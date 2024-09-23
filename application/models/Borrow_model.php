<?php
class Borrow_model extends CI_Model {
    
   

    public function get_all_borrows() {
    $this->db->select('tbl_borrow.*, tbl_borrower.name as borrower_name'); 
    $this->db->from('tbl_borrow');
    $this->db->join('tbl_borrower', 'tbl_borrow.borrower_id = tbl_borrower.id'); 
    return $this->db->get()->result();
}


   

    public function insert_borrow($data) {
        return $this->db->insert('tbl_borrow', $data);
    }

    public function update_borrow($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_borrow', $data);
    }
    public function get_borrower_by_id($borrower_id) {
    $this->db->select('*');
    $this->db->from('tbl_borrower');
    $this->db->where('id', $borrower_id);
    return $this->db->get()->row(); 
}
    public function delete_borrow($id) {
        return $this->db->delete('tbl_borrow', ['id' => $id]);
    }
    public function get_borrow_by_id($id) {
    $this->db->select('tbl_borrow.*, tbl_borrower.name as borrower_name');
    $this->db->from('tbl_borrow');
    $this->db->join('tbl_borrower', 'tbl_borrow.borrower_id = tbl_borrower.id', 'left');
    $this->db->where('tbl_borrow.id', $id);
    return $this->db->get()->row();
}

}