<!-- Extend the main layout -->
<?= $this->extend('layout/main_layout') ?>

<!-- Set the section content -->
<?= $this->section('content') ?>
<div class=" d-flex justify-content-center my-5 py-5">
    <div class="card w-50 bg-light bg-gradient">
        <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <?= form_open('/login') ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username') ?>">
                <?php if (isset(session('errors')['username'])) :  ?>
                    <div class="text-danger">
                        <?= esc(session('errors')['username']) ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="userpassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="userpassword" id="userpassword" value="<?= set_value('userpassword') ?>">
                <?php if (isset(session('errors')['password'])) :  ?>
                    <div class="text-danger">
                        <?= esc(session('errors')['password']) ?>
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