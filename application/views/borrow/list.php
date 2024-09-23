<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Borrow List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Borrow List</li>
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
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('borrow/create') ?>" class="btn btn-primary">Add Borrow</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Borrower Name</th>
                                        <th>Amount</th>
                                        <th>Borrowed Date</th>
                                        <th>Interest Rate</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($borrows as $borrow): ?>
                                    <tr>
                                        <td><?= $borrow->id; ?></td>
                                        <td><?= $borrow->borrower_name; ?></td>
                                        <td><?= $borrow->borrowed_amount; ?></td>
                                        <td><?= $borrow->borrowed_date; ?></td>
                                        <td><?= $borrow->rate_of_interest; ?>%</td>
                                        <td>
                                            <a href="<?= base_url('borrow/view/'.$borrow->borrower_id) ?>"
                                                class="fa fas fa-eye"></a> |
                                            <a href="<?= base_url('borrow/edit/'.$borrow->id) ?>"
                                                class="fa fas fa-pen"></a> |
                                            <a href="<?= base_url('borrow/delete/'.$borrow->id) ?>"
                                                class="fa fas fa-trash"></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('includes/footer'); ?>