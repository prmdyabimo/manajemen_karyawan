<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<div class="m-4">

    <h1>
        <?= $title; ?>
    </h1>

    <a href="<?= base_url('/'); ?>" style="margin: 6px 0px;" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>


    <form id="formEdit" method="POST" enctype="multipart/form-data"
        action="<?= base_url('/update/' . $employee['employee_id']); ?>">
        <?php csrf_field(); ?>

        <!-- NAME -->
        <div class="mb-3">
            <div class="input-group">
                <label for="validationCustom03" class="input-group-text" id="basic-addon1">Nama</label>
                <input type="text" class="form-control <?= validation_show_error('name') ? "is-invalid" : ""; ?>"
                    placeholder="Masukkan nama lengkap" aria-label="Username" aria-describedby="basic-addon1"
                    name="name" value="<?= $employee['name']; ?>" id="validationCustom03">
            </div>
            <?php if (validation_show_error('name')): ?>
                <span class="text-danger">
                    <?= validation_show_error('name') ?>
                </span>
            <?php endif; ?>
        </div>

        <!-- POSITION -->
        <div class="mb-3">
            <div class="input-group">
                <label class="input-group-text" id="basic-addon1">Posisi</label>
                <input type="text" class="form-control <?= validation_show_error('position') ? "is-invalid" : ""; ?>"
                    placeholder="Masukkan posisi" aria-label="Position" aria-describedby="basic-addon1" name="position"
                    value="<?= $employee['position']; ?>">
            </div>
            <?php if (validation_show_error('position')): ?>
                <span class="text-danger">
                    <?= validation_show_error('position') ?>
                </span>
            <?php endif; ?>
        </div>

        <!-- SALARY -->
        <div class="input-group mb-3">
            <div class="input-group">
                <label class="input-group-text" id="basic-addon1">Gaji</label>
                <input type="text" class="form-control <?= validation_show_error('salary') ? "is-invalid" : ""; ?>"
                    placeholder="Masukkan gaji, CONTOH : 1.250.000" aria-label="salary" aria-describedby="basic-addon1" name="salary"
                    value="<?= number_format($employee['salary'], 0, ',', '.'); ?>">
            </div>
            <?php if (validation_show_error('salary')): ?>
                <span class="text-danger">
                    <?= validation_show_error('salary') ?>
                </span>
            <?php endif; ?>
        </div>

        <button type="button" id="btnEdit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?= $this->endSection(); ?>