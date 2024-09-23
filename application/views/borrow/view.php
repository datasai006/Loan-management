<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Borrower Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Borrower Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <!-- Borrower Details in Form Format (Read-Only) -->
        <div class="box">
            <div class="box-header">
                <!-- <h3>Borrower Information</h3> -->
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $borrower->name; ?>"
                            readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile"
                            value="<?= $borrower->mobile; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address"
                            readonly><?= $borrower->address; ?></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="guarantor">Guarantor</label>
                        <input type="text" class="form-control" id="guarantor" name="guarantor"
                            value="<?= $borrower->guarantor; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="guarantor_mobile">Guarantor Mobile</label>
                        <input type="text" class="form-control" id="guarantor_mobile" name="guarantor_mobile"
                            value="<?= $borrower->guarantor_mobile; ?>" readonly>
                    </div>
                    <!-- <div class="form-group col-md-4">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="proof_photo">Proof Photo</label>
                        <input type="file" class="form-control" id="proof_photo" name="proof_photo">
                    </div> -->
                </div>

            </div>
        </div>

        <!-- Payment History Table -->
        <div class="box">
            <div class="box-header">
                <h3>Payment History</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped" id="example2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Payment Date</th>
                            <th>Payment Type</th>
                            <th>Amount</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($payments as $payment): ?>
                        <tr>
                            <td><?= $payment->id; ?></td>
                            <td><?= $payment->payment_date; ?></td>
                            <td><?= $payment->payment_type; ?></td>
                            <td><?= $payment->paid_amount; ?></td>
                            <!-- <td>
                                <a href="<?= base_url('payment/view/'.$payment->id) ?>" class="fa fas fa-eye"></a> |
                                <a href="<?= base_url('payment/edit/'.$payment->id) ?>" class="fa fas fa-pen"></a> |
                                <a href="<?= base_url('payment/delete/'.$payment->id) ?>" class="fa fas fa-trash"></a>
                            </td> -->
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('includes/footer'); ?>