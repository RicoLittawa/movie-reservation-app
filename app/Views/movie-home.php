<!-- Extend the main layout -->
<?= $this->extend('layout/main_layout') ?>

<!-- Set the section content -->
<?= $this->section('content') ?>
<div class="d-flex justify-content-between">
    <div class="my-5">
        <h1>Movie Seats</h1>
    </div>
    <div class="my-5">
        <button class="btn btn-light me-2">View Customers</button>
        <a href="<?= base_url('create/add-reservation'); ?>" class="btn btn-secondary">Create Reservation</a>
    </div>
</div>
<span class="d-flex fw-bold">Label: 
    <figure class="px-2 d-flex"><img width="24" height="24" src="https://img.icons8.com/material/24/FA5252/bus-seat-top-view.png" alt="bus-seat-top-view" /> <figcaption class="px-1 fw-normal">Reserved</figcaption></figure>
    <figure class="px-2 d-flex"><img width="24" height="24" src="https://img.icons8.com/material/24/737373/bus-seat-top-view.png" alt="bus-seat-top-view" /> <figcaption class="px-1 fw-normal">Not Occupied</figcaption></figure>
</span>
<div class="bg-secondary mx-5 d-flex justify-content-center py-3 my-3 text-white">
    Now Showing : Godzilla vs King Kong</div>
<section class="mt-5 pt-5">
    <div class="d-flex justify-content-center">
        <?php foreach ($seats as $key => $seat) : ?>
            <?php if ($key + 1 <= 3) : ?>
                <figure class="px-3">
                    <?php if ($seat['selected'] == 1) : ?>
                        <img width="24" height="24" src="https://img.icons8.com/material/24/FA5252/bus-seat-top-view.png" alt="bus-seat-top-view" />
                    <?php else : ?>
                        <img width="24" height="24" src="https://img.icons8.com/material/24/737373/bus-seat-top-view.png" alt="bus-seat-top-view" />
                    <?php endif ?>
                    <figcaption class="text-center"><?= $seat['seat_number'] ?></figcaption>
                </figure>
            <?php endif ?>
        <?php endforeach  ?>
    </div>
    <div class="d-flex justify-content-center">
        <?php foreach ($seats as $key => $seat) : ?>
            <?php if ($key + 1 >= 4 && $key + 1 <= 8) : ?>
                <figure class="px-3">
                    <?php if ($seat['selected'] == 1) : ?>
                        <img width="24" height="24" src="https://img.icons8.com/material/24/FA5252/bus-seat-top-view.png" alt="bus-seat-top-view" />
                    <?php else : ?>
                        <img width="24" height="24" src="https://img.icons8.com/material/24/737373/bus-seat-top-view.png" alt="bus-seat-top-view" />
                    <?php endif ?>
                    <figcaption class="text-center"><?= $seat['seat_number'] ?></figcaption>
                </figure>
            <?php endif ?>
        <?php endforeach  ?>
    </div>
    <div class="d-flex justify-content-center">
        <div class="d-flex px-3">
            <?php foreach ($seats as $key => $seat) : ?>
                <?php if ($key + 1 >= 9 && $key + 1 <= 13) : ?>
                    <figure class="px-3">
                        <?php if ($seat['selected'] == 1) : ?>
                            <img width="24" height="24" src="https://img.icons8.com/material/24/FA5252/bus-seat-top-view.png" alt="bus-seat-top-view" />
                        <?php else : ?>
                            <img width="24" height="24" src="https://img.icons8.com/material/24/737373/bus-seat-top-view.png" alt="bus-seat-top-view" />
                        <?php endif ?>
                        <figcaption class="text-center"><?= $seat['seat_number'] ?></figcaption>
                    </figure>
                <?php endif ?>
            <?php endforeach  ?>
        </div>
        <div class="d-flex px-3">
            <?php foreach ($seats as $key => $seat) : ?>
                <?php if ($key + 1 >= 14 && $key + 1 <= 18) : ?>
                    <figure class="px-3">
                        <?php if ($seat['selected'] == 1) : ?>
                            <img width="24" height="24" src="https://img.icons8.com/material/24/FA5252/bus-seat-top-view.png" alt="bus-seat-top-view" />
                        <?php else : ?>
                            <img width="24" height="24" src="https://img.icons8.com/material/24/737373/bus-seat-top-view.png" alt="bus-seat-top-view" />
                        <?php endif ?>
                        <figcaption class="text-center"><?= $seat['seat_number'] ?></figcaption>
                    </figure>
                <?php endif ?>
            <?php endforeach  ?>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="d-flex px-3">
            <?php foreach ($seats as $key => $seat) : ?>
                <?php if ($key + 1 >= 19 && $key + 1 <= 24) : ?>
                    <figure class="px-3">
                        <?php if ($seat['selected'] == 1) : ?>
                            <img width="24" height="24" src="https://img.icons8.com/material/24/FA5252/bus-seat-top-view.png" alt="bus-seat-top-view" />
                        <?php else : ?>
                            <img width="24" height="24" src="https://img.icons8.com/material/24/737373/bus-seat-top-view.png" alt="bus-seat-top-view" />
                        <?php endif ?>
                        <figcaption class="text-center"><?= $seat['seat_number'] ?></figcaption>
                    </figure>
                <?php endif ?>
            <?php endforeach  ?>
        </div>
        <div class="d-flex px-3">
            <?php foreach ($seats as $key => $seat) : ?>
                <?php if ($key + 1 >= 25 && $key + 1 <= 30) : ?>
                    <figure class="px-3">
                        <?php if ($seat['selected'] == 1) : ?>
                            <img width="24" height="24" src="https://img.icons8.com/material/24/FA5252/bus-seat-top-view.png" alt="bus-seat-top-view" />
                        <?php else : ?>
                            <img width="24" height="24" src="https://img.icons8.com/material/24/737373/bus-seat-top-view.png" alt="bus-seat-top-view" />
                        <?php endif ?>
                        <figcaption class="text-center"><?= $seat['seat_number'] ?></figcaption>
                    </figure>
                <?php endif ?>
            <?php endforeach  ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>