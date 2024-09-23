<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// class Borrower extends CI_Controller {

//     public function __construct() {
//         parent::__construct();
//         $this->load->model('Borrower_model');
//     }

//     public function index() {
//         $data['borrowers'] = $this->Borrower_model->get_all_borrowers();
//         $this->load->view('borrower/list', $data);
//     }

//     public function create() {
//         if ($this->input->post()) {
//             $data = array(
//                 'name' => $this->input->post('name'),
//                 'mobile' => $this->input->post('mobile'),
//                 'address' => $this->input->post('address'),
//                 'guarantor' => $this->input->post('guarantor'),
//                 'guarantor_mobile' => $this->input->post('guarantor_mobile'),
//                 'photo' => $this->input->post('photo'),
//                 'proof_photo' => $this->input->post('proof_photo')
//             );
//             $this->Borrower_model->insert_borrower($data);
//             redirect('borrower');
//         } else {
//             $this->load->view('borrower/create');
//         }
//     }

//     public function edit($id) {
//         if ($this->input->post()) {
//             $data = array(
//                 'name' => $this->input->post('name'),
//                 'mobile' => $this->input->post('mobile'),
//                 'address' => $this->input->post('address'),
//                 'guarantor' => $this->input->post('guarantor'),
//                 'guarantor_mobile' => $this->input->post('guarantor_mobile'),
//                 'photo' => $this->input->post('photo'),
//                 'proof_photo' => $this->input->post('proof_photo')
//             );
//             $this->Borrower_model->update_borrower($id, $data);
//             redirect('borrower');
//         } else {
//             $data['borrower'] = $this->Borrower_model->get_borrower_by_id($id);
//             $this->load->view('borrower/edit', $data);
//         }
//     }

//     public function delete($id) {
//         $this->Borrower_model->delete_borrower($id);
//         redirect('borrower');
//     }
// }
class Borrower extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Borrower_model');
        $this->load->library('upload');
    }

    public function index() {
        $data['borrowers'] = $this->Borrower_model->get_all_borrowers();
        $this->load->view('borrower/list', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $data = array(
                'name' => $this->input->post('name'),
                'mobile' => $this->input->post('mobile'),
                'address' => $this->input->post('address'),
                'guarantor' => $this->input->post('guarantor'),
                'guarantor_mobile' => $this->input->post('guarantor_mobile'),
            );

            // Handle file upload for photo
            if ($_FILES['photo']['name']) {
                $config['upload_path'] = './assets/uploads/photos/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 2048; // 2MB
                $this->upload->initialize($config);

                if ($this->upload->do_upload('photo')) {
                    $data['photo'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('errors', $this->upload->display_errors());
                    redirect('borrower/create');
                }
            }

            // Handle file upload for proof photo
            if ($_FILES['proof_photo']['name']) {
                $config['upload_path'] = './assets/uploads/proof_photos/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                $config['max_size'] = 2048; // 2MB
                $this->upload->initialize($config);

                if ($this->upload->do_upload('proof_photo')) {
                    $data['proof_photo'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('errors', $this->upload->display_errors());
                    redirect('borrower/create');
                }
            }

            $this->Borrower_model->insert_borrower($data);
            redirect('borrower');
        } else {
            $this->load->view('borrower/create');
        }
    }

    public function edit($id) {
        $borrower = $this->Borrower_model->get_borrower_by_id($id);

        if ($this->input->post()) {
            $data = array(
                'name' => $this->input->post('name'),
                'mobile' => $this->input->post('mobile'),
                'address' => $this->input->post('address'),
                'guarantor' => $this->input->post('guarantor'),
                'guarantor_mobile' => $this->input->post('guarantor_mobile'),
            );

            // Handle file upload for photo
            if ($_FILES['photo']['name']) {
                // Delete old photo
                if ($borrower->photo) {
                    @unlink('.assets/uploads/photos/' . $borrower->photo);
                }

                $config['upload_path'] = '.assets/uploads/photos/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 2048; // 2MB
                $this->upload->initialize($config);

                if ($this->upload->do_upload('photo')) {
                    $data['photo'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('errors', $this->upload->display_errors());
                    redirect('borrower/edit/' . $id);
                }
            }

            // Handle file upload for proof photo
            if ($_FILES['proof_photo']['name']) {
                // Delete old proof photo
                if ($borrower->proof_photo) {
                    @unlink('./uploads/proof_photos/' . $borrower->proof_photo);
                }

                $config['upload_path'] = '.assets/uploads/proof_photos/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                $config['max_size'] = 2048; // 2MB
                $this->upload->initialize($config);

                if ($this->upload->do_upload('proof_photo')) {
                    $data['proof_photo'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('errors', $this->upload->display_errors());
                    redirect('borrower/edit/' . $id);
                }
            }

            $this->Borrower_model->update_borrower($id, $data);
            redirect('borrower');
        } else {
            $data['borrower'] = $borrower;
            $this->load->view('borrower/edit', $data);
        }
    }

    public function delete($id) {
        $borrower = $this->Borrower_model->get_borrower_by_id($id);
        
        // Delete photos if they exist
        if ($borrower->photo) {
            @unlink('.assets/uploads/photos/' . $borrower->photo);
        }
        
        if ($borrower->proof_photo) {
            @unlink('.assets/uploads/proof_photos/' . $borrower->proof_photo);
        }
        
        $this->Borrower_model->delete_borrower($id);
        redirect('borrower');
    }
}