<!-- Extend the main layout -->
<?= $this->extend('layout/main_layout') ?>

<!-- Set the section content -->
<?= $this->section('content') ?>

<section class="my-5">
    <div class="d-flex my-5">
        <a href="<?= base_url('view') ?>" class="btn fs-3 "><i class='bx bx-arrow-back'></i></a>
        <h1 class="mx-2">Update Information</h1>
    </div>
    <div>
        <h5>Reserved Seats</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Seat Number</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($seats as $key => $seat) : ?>
                    <?php foreach ($customer as $c) :  ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $seat['seatNumber'] ?></td>
                            <td><?= $c['reservedDate'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div>
        <h5>Personal Information</h5>
        <?php $errors = session('errors'); ?>
        <?= form_open(route_to('update_reservation/')) ?>
        <?php foreach ($customer as $c) : ?>
            <div class="mb-3">
                <label for="customerName" class="form-label">Fullname</label>
                <input type="text" class="form-control" name="customerName" value="<?= set_value('customerName', esc($c['customerName'])) ?>">
                <?php if (isset($errors['customerName'])) :  ?>
                    <div class="text-danger">
                        <?= esc($errors['customerName']) ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="customerEmail" class="form-label">Fullname</label>
                <input type="text" class="form-control" name="customerEmail" value="<?= set_value('customerEmail', esc($c['customerEmail'])) ?>">
                <?php if (isset($errors['customerEmail'])) :  ?>
                    <div class="text-danger">
                        <?= esc($errors['customerEmail']) ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="customerAddress" class="form-label">Fullname</label>
                <input type="text" class="form-control" name="customerAddress" value="<?= set_value('customerAddress', esc($c['customerAddress'])) ?>">
                <?php if (isset($errors['customerAddress'])) :  ?>
                    <div class="text-danger">
                        <?= esc($errors['customerAddress']) ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="customerContact" class="form-label">Fullname</label>
                <input type="text" class="form-control" name="customerContact" value="<?= set_value('customerContact', esc($c['customerContact'])) ?>">
                <?php if (isset($errors['customerContact'])) :  ?>
                    <div class="text-danger">
                        <?= esc($errors['customerContact']) ?>
                    </div>
                <?php endif; ?>
            </div>

        <?php endforeach ?>
        <div class="d-flex justify-content-end">
            <a href="<?= base_url('view') ?>" class="btn btn-danger btn-lg">Cancel</a>
            <button type="submit" class="btn btn-secondary btn-lg ms-2">Update</button>
        </div>

        <?= form_close() ?>
    </div>
</section>

<!-- Set the end section -->
<?= $this->endSection() ?>