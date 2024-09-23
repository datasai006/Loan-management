<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payments List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Payments</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= base_url('payment/create') ?>" class="btn btn-primary">Add New Payments</a>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Borrower</th>
                                        <th>Payment Date</th>
                                        <th>Payment Type</th>
                                        <th>Paid Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($payments as $payment): ?>
                                    <tr>
                                        <td><?= $payment->id ?></td>
                                        <td><?= $payment->borrower_id ?></td>
                                        <td><?= $payment->payment_date ?></td>
                                        <td><?= $payment->payment_type ?></td>
                                        <td><?= $payment->paid_amount ?></td>
                                        <td>
                                            <a href="<?= base_url('payment/edit/'.$payment->id) ?>"
                                                class="fa fas fa-pen"></a> |
                                            <a href="<?= base_url('payment/delete/'.$payment->id) ?>"
                                                class="fa fas fa-trash" onclick="return confirm('Are you sure?')"></a>
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