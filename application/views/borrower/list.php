<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Borrowers List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Borrowers</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= base_url('borrower/create') ?>" class="btn btn-primary">Add New Borrower</a>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($borrowers as $borrower): ?>
                                    <tr>
                                        <td><?= $borrower['name'] ?></td>
                                        <td><?= $borrower['mobile'] ?></td>
                                        <td><?= $borrower['address'] ?></td>
                                        <td>
                                            <a href="<?= base_url('borrower/edit/' . $borrower['id']) ?>"
                                                class="fa fas fa-pen"></a> |
                                            <a href="<?= base_url('borrower/delete/' . $borrower['id']) ?>"
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