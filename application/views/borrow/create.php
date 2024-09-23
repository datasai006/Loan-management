<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Borrow</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Borrow</li>
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
                        <form action="<?= base_url('borrow/create') ?>" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="borrower_id">Borrower Name</label>
                                        <select class="form-control" id="borrower_id" name="borrower_id" required>
                                            <option value="">Select Borrower</option>
                                            <?php foreach ($borrowers as $borrower): ?>
                                            <option value="<?= $borrower['id'] ?>"><?= $borrower['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="borrowed_amount">Borrowed Amount</label>
                                        <input type="text" class="form-control" id="borrowed_amount"
                                            name="borrowed_amount" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="borrowed_date">Borrowed Date</label>
                                        <input type="date" class="form-control" id="borrowed_date" name="borrowed_date"
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="rate_of_interest">Rate of Interest (%)</label>
                                        <input type="text" class="form-control" id="rate_of_interest"
                                            name="rate_of_interest" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="interest_type">Interest Type</label>
                                        <select class="form-control" id="interest_type" name="interest_type" required>
                                            <option value="">--select one--</option>
                                            <option value="weekly">weekly</option>
                                            <option value="monthly">monthly</option>
                                            <option value="Quaterly">Quaterly</option>
                                            <option value="yearly">yearly</option>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group col-md-4">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="active">Active</option>
                                            <option value="closed">Closed</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group col-md-4">
                                        <label for="end_date">End Date</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date">
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