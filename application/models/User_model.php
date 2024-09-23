<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function register($data) {
        return $this->db->insert('tbl_user', $data);
    }

    public function login($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('tbl_user');
        
        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return false;
    }
     public function get_all_users() {
        return $this->db->get('tbl_user')->result();
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('tbl_user', ['id' => $id])->row();
    }

    // public function insert_user($data) {
    //     return $this->db->insert('tbl_user', $data);
    // }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_user', $data);
    }

    public function delete_user($id) {
        return $this->db->delete('tbl_user', ['id' => $id]);
    }
}