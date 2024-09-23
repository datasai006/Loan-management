<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Payment_model');
        $this->load->model('Borrower_model'); // To retrieve borrower details
    }

    // List all payments
    public function index() {
        $data['payments'] = $this->Payment_model->get_all_payments();
        $this->load->view('payment/list', $data);
    }

    // Create a new payment
    public function create() {
        if ($this->input->post()) {
            $data = array(
                'borrower_id' => $this->input->post('borrower_id'),
                'payment_date' => $this->input->post('payment_date'),
                'payment_type' => $this->input->post('payment_type'),
                'paid_amount' => $this->input->post('paid_amount'),
            );
            $this->Payment_model->insert_payment($data);
            redirect('payment');
        } else {
            $data['borrowers'] = $this->Borrower_model->get_all_borrowers(); 
            $this->load->view('payment/create', $data);
        }
    }

    // Edit an existing payment
    public function edit($id) {
        if ($this->input->post()) {
            $data = array(
                'borrower_id' => $this->input->post('borrower_id'),
                'payment_date' => $this->input->post('payment_date'),
                'payment_type' => $this->input->post('payment_type'),
                'paid_amount' => $this->input->post('paid_amount'),
            );
            $this->Payment_model->update_payment($id, $data);
            redirect('payment');
        } else {
            $data['payment'] = $this->Payment_model->get_payment_by_id($id);
            $data['borrowers'] = $this->Borrower_model->get_all_borrowers(); // Get borrower details
            $this->load->view('payment/edit', $data);
        }
    }

    // Delete a payment
    public function delete($id) {
        $this->Payment_model->delete_payment($id);
        redirect('payment');
    }
}