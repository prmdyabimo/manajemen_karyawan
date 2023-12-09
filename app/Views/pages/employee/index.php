<?= $this->extend('layouts/app.php'); ?>

<?= $this->section('content'); ?>

<div class="m-4">
    <h1>
        <?= $title; ?>
    </h1>

    <button style="margin: 12px 0px;" type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        Tambah Karyawan
    </button>

    <table id="dataEmployees" class="table table-bordered table-striped dt-responsive nowrap">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Position</th>
                <th>Gaji</th>
                <th>Waktu Dibuat</th>
                <th>Waktu Diubah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td>
                        <?= $no++; ?>
                    </td>
                    <td>
                        <?= $employee['name']; ?>
                    </td>
                    <td>
                        <?= $employee['position']; ?>
                    </td>
                    <td>
                        <?= formatRupiah($employee['salary']); ?>
                    </td>
                    <td>
                        <?= $employee['created_at']; ?>
                    </td>
                    <td>
                        <?= $employee['updated_at']; ?>
                    </td>
                    <td class="listBtn">
                        <a href="<?= base_url('/show/' . $employee['employee_id']); ?>" class="btnShow">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?= base_url('/edit/' . $employee['employee_id']); ?>" class="btnEdit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?= base_url('/delete/' . $employee['employee_id']); ?>" class="btnDelete">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Vertically centered modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Karyawan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCreate" action="<?= base_url('/store'); ?>" method="POST" enctype="multipart/form-data">
                    <?php csrf_field(); ?>

                    <!-- NAME -->
                    <div class="mb-3">
                        <div class="input-group">
                            <label for="validationCustom03" class="input-group-text" id="basic-addon1">Nama</label>
                            <input type="text"
                                class="form-control <?= validation_show_error('name') ? "is-invalid" : ""; ?>"
                                placeholder="Masukkan nama lengkap" aria-label="Username"
                                aria-describedby="basic-addon1" name="name" value="<?= old('name'); ?>"
                                id="validationCustom03">
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
                            <input type="text"
                                class="form-control <?= validation_show_error('position') ? "is-invalid" : ""; ?>"
                                placeholder="Masukkan posisi" aria-label="Position" aria-describedby="basic-addon1"
                                name="position" value="<?= old('position'); ?>">
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
                            <input type="text"
                                class="form-control <?= validation_show_error('salary') ? "is-invalid" : ""; ?>"
                                placeholder="Masukkan gaji, CONTOH : 1.250.000" aria-label="salary"
                                aria-describedby="basic-addon1" name="salary" value="<?= old('salary'); ?>">
                        </div>
                        <?php if (validation_show_error('salary')): ?>
                            <span class="text-danger">
                                <?= validation_show_error('salary') ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <button type="button" id="btnCreate" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>