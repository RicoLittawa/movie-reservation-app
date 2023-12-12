<!-- Extend the main layout -->
<?= $this->extend('layout/main_layout') ?>

<!-- Set the section content -->
<?= $this->section('content') ?>


<section class="my-5">
    <div class="d-flex my-5">
        <a href="<?= base_url(route_to('view_customers')) ?>" class="btn fs-3 "><i class='bx bx-arrow-back'></i></a>
        <h1 class="mx-2">Are you sure?</h1>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <div class="mx-5 my-5">
                <?php foreach ($customer as $c) : ?>
                    <div class="text-center">
                        <h4 class="card-title">Do you want to delete this data of <strong><?= $c['customerName'] ?></strong>?</h4>
                        <p class="text-muted">All of its data will be deleted</p>
                        <?= $c['referenceNumber'] ?>
                    </div>
                    <div class="text-center">
                        <img src="<?= base_url('/assets/undraw_throw_away_re_x60k.svg') ?>" alt="" width="200" height="200">
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="<?= base_url(route_to('view_customers')) ?>" href="<?= base_url(route_to('view_customers')) ?>" class="btn btn-secondary btn-lg">Cancel</a>
                        <a href="<?= base_url(route_to('delete_reservation',$c['referenceNumber'])) ?>" class="btn btn-danger btn-lg ms-2">Confirm</a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<!-- Set the end section -->
<?= $this->endSection() ?>