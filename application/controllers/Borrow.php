<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrow extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Borrow_model');
         $this->load->model('Borrower_model');
         $this->load->model('Payment_model'); 
    }

    public function index() {
        $data['borrows'] = $this->Borrow_model->get_all_borrows();
        $this->load->view('borrow/list', $data);
    }
    
   public function view($borrower_id) {        
    $data['borrower'] = $this->Borrow_model->get_borrower_by_id($borrower_id);  
    $data['payments'] = $this->Payment_model->get_payments_by_borrower($borrower_id);    
    $this->load->view('borrow/view', $data);
}


    public function create() {
        if ($this->input->post()) {
            $data = array(
                'borrower_id' => $this->input->post('borrower_id'),
                'borrowed_amount' => $this->input->post('borrowed_amount'),
                'borrowed_date' => $this->input->post('borrowed_date'),
                'rate_of_interest' => $this->input->post('rate_of_interest'),
                'interest_type' => $this->input->post('interest_type'),
                'end_date' => $this->input->post('end_date')
            );
            $this->Borrow_model->insert_borrow($data);
            redirect('borrow');
        } else {
             $data['borrowers'] = $this->Borrower_model->get_all_borrowers();
            $this->load->view('borrow/create', $data);
        }
    }

    // public function edit($id) {
    //     if ($this->input->post()) {
    //         $data = array(
    //             'borrower_id' => $this->input->post('borrower_id'),
    //             'borrowed_amount' => $this->input->post('borrowed_amount'),
    //             'borrowed_date' => $this->input->post('borrowed_date'),
    //             'rate_of_interest' => $this->input->post('rate_of_interest'),
    //             'interest_type' => $this->input->post('interest_type'),
    //             'end_date' => $this->input->post('end_date')
    //         );
    //         $this->Borrow_model->update_borrow($id, $data);
    //         redirect('borrow');
    //     } else {
    //         $data['borrow'] = $this->Borrow_model->get_borrow_by_id($id);
    //         $this->load->view('borrow/edit', $data);
    //     }
    // }

    public function edit($id) {
    if ($this->input->post()) {
        $data = array(
            'borrower_id' => $this->input->post('borrower_id'),
            'borrowed_amount' => $this->input->post('borrowed_amount'),
            'borrowed_date' => $this->input->post('borrowed_date'),
            'rate_of_interest' => $this->input->post('rate_of_interest'),
            'interest_type' => $this->input->post('interest_type'),
            'status' => $this->input->post('status'),
            'end_date' => $this->input->post('end_date')
        );
        $this->Borrow_model->update_borrow($id, $data);
        redirect('borrow');
    } else {
        // Fetch all borrowers and the borrow details
        $data['borrow'] = $this->Borrow_model->get_borrow_by_id($id);
        $data['borrowers'] = $this->Borrower_model->get_all_borrowers(); 
        $this->load->view('borrow/edit', $data);
    }
}


    public function delete($id) {
        $this->Borrow_model->delete_borrow($id);
        redirect('borrow');
    }
}