<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Create Payment</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <!-- Form Start -->
                        <form action="<?= base_url('payment/create') ?>" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Borrower Dropdown -->
                                    <div class="form-group  col-md-4">
                                        <label for="borrower_id">Borrower Name</label>
                                        <select class="form-control" id="borrower_id" name="borrower_id">
                                            <?php foreach ($borrowers as $borrower): ?>
                                            <option value="<?= $borrower['id'] ?>"><?= $borrower['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Payment Date -->
                                    <div class="form-group  col-md-4">
                                        <label for="payment_date">Payment Date</label>
                                        <input type="date" class="form-control" id="payment_date" name="payment_date"
                                            required>
                                    </div>

                                    <!-- Payment Type -->
                                    <div class="form-group  col-md-4">
                                        <label for="payment_type">Payment Type</label>
                                        <select class="form-control" id="payment_type" name="payment_type">
                                            <option value="cash">Cash</option>
                                            <option value="online">Online</option>
                                            <option value="cheque">Cheque</option>
                                        </select>
                                    </div>

                                    <!-- Paid Amount -->
                                    <div class="form-group  col-md-4">
                                        <label for="paid_amount">Paid Amount</label>
                                        <input type="text" class="form-control" id="paid_amount" name="paid_amount"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
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