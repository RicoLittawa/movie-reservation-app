<!-- Extend the main layout -->
<?= $this->extend('layout/main_layout') ?>

<!-- Set the section content -->
<?= $this->section('content') ?>

<section class="my-5">
    <div class="d-flex my-5">
        <a href="<?= base_url("") ?>" class="btn fs-3 "><i class='bx bx-arrow-back'></i></a>
        <h1 class="mx-2">List Of Customers</h1>
    </div>
    <div>
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Reserve Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $key => $customer) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $customer['customerName'] ?></td>
                        <td><?= $customer['customerEmail'] ?></td>
                        <td><?= $customer['customerAddress'] ?></td>
                        <td><?= $customer['customerContact'] ?></td>
                        <td><?= $customer['reservedDate'] ?></td>
                        <td>
                            <a href="<?= base_url(route_to('update_reservation', $customer['referenceNumber'])) ?>" class="btn btn-secondary">View</a>
                            <button class="btn btn-danger ms-2">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<!-- Set the end section -->
<?= $this->endSection() ?>