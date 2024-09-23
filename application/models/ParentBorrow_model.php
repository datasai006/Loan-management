<?php
class ParentBorrow_model extends CI_Model {
    
    public function get_all_parent_borrows() {
        return $this->db->get('tbl_parent_borrow')->result();
    }

    public function get_parent_borrow_by_id($id) {
        return $this->db->get_where('tbl_parent_borrow', ['id' => $id])->row();
    }

    public function insert_parent_borrow($data) {
        return $this->db->insert('tbl_parent_borrow', $data);
    }

    public function update_parent_borrow($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_parent_borrow', $data);
    }

    public function delete_parent_borrow($id) {
        return $this->db->delete('tbl_parent_borrow', ['id' => $id]);
    }
}