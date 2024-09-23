<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

    // Get all payments
    public function get_all_payments() {
        $this->db->select('*');
        $this->db->from('tbl_payment');
        $this->db->join('tbl_borrower', 'tbl_payment.borrower_id = tbl_borrower.id'); // If you want borrower details
        return $this->db->get()->result();
    }

    // Get a payment by id
    public function get_payment_by_id($id) {
        return $this->db->get_where('tbl_payment', ['id' => $id])->row();
    }

    // Insert a new payment
    public function insert_payment($data) {
        return $this->db->insert('tbl_payment', $data);
    }

    // Update an existing payment
    public function update_payment($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tbl_payment', $data);
    }
    public function get_payments_by_borrower($borrower_id) {
    $this->db->select('*');
    $this->db->from('tbl_payment');
    $this->db->where('borrower_id', $borrower_id);
    return $this->db->get()->result(); // Return multiple rows (payments)
}


    // Delete a payment by id
    public function delete_payment($id) {
        return $this->db->delete('tbl_payment', ['id' => $id]);
    }
}