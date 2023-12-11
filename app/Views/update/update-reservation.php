<!-- Extend the main layout -->
<?= $this->extend('layout/main_layout') ?>

<!-- Set the section content -->
<?= $this->section('content') ?>

<section class="my-5">
    <div class="d-flex my-5">
        <a href="<?= base_url(route_to('view_customers')) ?>" class="btn fs-3 "><i class='bx bx-arrow-back'></i></a>
        <h1 class="mx-2">Update Information</h1>
    </div>
    <div>
        <h5>Reserved Seats</h5>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Seat Number</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($seats as $key => $seat) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $seat['seatNumber'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div>
        <h5>Personal Information</h5>
        <?= form_open('update_reservation') ?>
        <?php foreach ($customer as $c) : ?>
            <div class="mb-3">
                <label for="customerName" class="form-label">Fullname</label>
                <input type="text" class="form-control" id="customerName" name="customerName" value="<?= set_value('customerName', esc($c['customerName'])) ?>">
            </div>
            <div class="mb-3">
                <label for="customerName" class="form-label">Reserved Date</label>
                <input type="text" class="form-control" id="customerName" name="customerName" value="<?= set_value('customerName', esc($c['customerName'])) ?>">
            </div>
        <?php endforeach ?>

        <?= form_close() ?>
    </div>
</section>

<!-- Set the end section -->
<?= $this->endSection() ?>