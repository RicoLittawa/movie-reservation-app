<!-- Extend the main layout -->
<?= $this->extend('layout/main_layout') ?>

<!-- Set the section content -->
<?= $this->section('content') ?>
<section class="my-5">
    <div class="d-flex">
        <a href="<?= base_url("") ?>" class="btn fs-3 "><i class='bx bx-arrow-back'></i></a>
        <h1 class="mx-2">Add Reservation</h1>
    </div>
    <div>
        <?= form_open('create/add-reservation') ?>
        <input type="text" value="<?= set_value('referenceNumber', esc($referenceNumber)) ?>" name="referenceNumber" hidden>
        <div class="mb-3">
            <label for="customerName" class="form-label">Fullname</label>
            <input type="text" class="form-control 
            <?php if (isset(session('errors')['customerName'])) {
                echo "is-invalid";
            } ?>" id="customerName" name="customerName" value="<?= set_value('customerName') ?>">
            <?php if (isset(session('errors')['customerName'])) :  ?>
                <div class="text-danger">
                    <?= esc(session('errors')['customerName']) ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="checkboxes">
            <div>
                <label for="" class="form-label">Select seats:</label>
                <?php if (isset(session('errors')['seatNumber'])) :  ?>
                    <div class="text-danger">
                        <?= esc(session('errors')['seatNumber']) ?>
                    </div>
                <?php endif; ?>
                <span class="d-flex fw-bold">Label:
                    <figure class="px-2 d-flex"><img width="24" height="24" src="https://img.icons8.com/material/24/FA5252/bus-seat-top-view.png" alt="bus-seat-top-view" />
                        <figcaption class="px-1 fw-normal">Reserved</figcaption>
                    </figure>
                    <figure class="px-2 d-flex"><img width="24" height="24" src="https://img.icons8.com/material/24/737373/bus-seat-top-view.png" alt="bus-seat-top-view" />
                        <figcaption class="px-1 fw-normal">Not Occupied</figcaption>
                    </figure>
                </span>
            </div>
            <div class="bg-secondary mx-5 d-flex justify-content-center py-3 my-5 text-white">
                Now Showing : Godzilla vs King Kong</div>
            <section class="my-5 pt-5">
                <div class="d-flex justify-content-center">
                    <?php foreach ($seats as $key => $seat) : ?>
                        <?php if ($key + 1 <= 3) : ?>
                            <figure class="px-3">
                                <?php if ($seat['selected'] == 1) : ?>
                                    <img width="24" height="24" src="https://img.icons8.com/material/24/FA5252/bus-seat-top-view.png" alt="bus-seat-top-view" />
                                <?php else : ?>
                                    <input class="form-check-input" name="seatlist[]" type="checkbox" value="<?= $seat['seat_number'] ?>" <?= set_checkbox('seatlist', $seat['seat_number']) ?>>
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
                                    <input class="form-check-input" name="seatlist[]" type="checkbox" value="<?= $seat['seat_number'] ?>" <?= set_checkbox('seatlist', $seat['seat_number']) ?>>
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
                                        <input class="form-check-input" name="seatlist[]" type="checkbox" value="<?= $seat['seat_number'] ?>" <?= set_checkbox('seatlist', $seat['seat_number']) ?>>
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
                                        <input class="form-check-input" name="seatlist[]" type="checkbox" value="<?= $seat['seat_number'] ?>" <?= set_checkbox('seatlist', $seat['seat_number']) ?>>
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
                                        <input class="form-check-input" name="seatlist[]" type="checkbox" value="<?= $seat['seat_number'] ?>" <?= set_checkbox('seatlist', $seat['seat_number']) ?>>
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
                                        <input class="form-check-input" name="seatlist[]" type="checkbox" value="<?= $seat['seat_number'] ?>" <?= set_checkbox('seatlist', $seat['seat_number']) ?>>
                                        <img width="24" height="24" src="https://img.icons8.com/material/24/737373/bus-seat-top-view.png" alt="bus-seat-top-view" />
                                    <?php endif ?>
                                    <figcaption class="text-center"><?= $seat['seat_number'] ?></figcaption>
                                </figure>
                            <?php endif ?>
                        <?php endforeach  ?>
                    </div>
                </div>
            </section>

        </div>
        <div class="mb-3">
            <label for="reservedDate" class="form-label">Date Reserved</label>
            <input type="date" class="form-control
            <?php if (isset(session('errors')['reservedDate'])) {
                echo "is-invalid";
            } ?>" name="reservedDate" id="reservedDate" value="<?= set_value('reservedDate') ?>">
            <?php if (isset(session('errors')['reservedDate'])) :  ?>
                <div class="text-danger">
                    <?= esc(session('errors')['reservedDate']) ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-end mt-5">
            <button class="btn btn-lg btn-secondary" type="submit">Submit</button>
        </div>
        <?= form_close() ?>
    </div>
</section>


<!-- Set the end section -->
<?= $this->endSection() ?>