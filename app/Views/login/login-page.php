<!-- Extend the main layout -->
<?= $this->extend('layout/main_layout') ?>

<!-- Set the section content -->
<?= $this->section('content') ?>
<?php $errors = session('errors'); ?>
<div class=" d-flex justify-content-center my-5 py-5">
    <div class="card w-50 bg-light bg-gradient">
        <div class="card-body">
            <h3 class="card-title text-center my-3">Login</h3>
            <?php if (isset($errors['warning'])) : ?>
                <div class="alert alert-warning"> <?= esc($errors['warning']) ?>
                </div>
            <?php endif ?>
            <?= form_open('/login') ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control 
                <?php if (isset($errors['username']) || isset($errors['warning'])) {
                    echo "is-invalid";
                } ?>" id="username" name="username" value="<?= set_value('username') ?>">
                <?php if (isset($errors['username'])) :  ?>
                    <div class="text-danger">
                        <?= esc($errors['username']) ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="userpassword" class="form-label">Password</label>
                <input type="password" class="form-control
                <?php if (isset($errors['password']) || isset($errors['warning'])) {
                    echo "is-invalid";
                } ?>" name="userpassword" id="userpassword" value="<?= set_value('userpassword') ?>">
                <?php if (isset($errors['password'])) :  ?>
                    <div class="text-danger">
                        <?= esc($errors['password']) ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-lg btn-outline-secondary">Submit</button>
            </div>
            <?= form_close() ?>
        </div>
        <div class="d-flex mx-3">
            <span>Username: admin</span>
            <span class="ps-1">Password: admin</span>
        </div>
    </div>

</div>


<?= $this->endSection() ?>