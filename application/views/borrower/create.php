<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Borrower</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Borrower</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form action="<?= base_url('borrower/create') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <?php if ($this->session->flashdata('errors')): ?>
                                <div class="alert alert-danger"><?= $this->session->flashdata('errors'); ?></div>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter borrower name" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            placeholder="Enter mobile number" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address"
                                            placeholder="Enter address" required></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="guarantor">Guarantor</label>
                                        <input type="text" class="form-control" id="guarantor" name="guarantor"
                                            placeholder="Enter guarantor's name" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="guarantor_mobile">Guarantor Mobile</label>
                                        <input type="text" class="form-control" id="guarantor_mobile"
                                            name="guarantor_mobile" placeholder="Enter guarantor's mobile number"
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control" id="photo" name="photo" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="proof_photo">Proof Photo</label>
                                        <input type="file" class="form-control" id="proof_photo" name="proof_photo"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('includes/footer'); ?>