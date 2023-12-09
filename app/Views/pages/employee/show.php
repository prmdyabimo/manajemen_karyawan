<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>


<div class="m-4">

    <h1>
        <?= $title; ?>
    </h1>

    <a href="<?= base_url('/'); ?>" style="margin: 6px 0px;" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Employee Id</th>
                <th scope="col">Nama</th>
                <th scope="col">Posisi</th>
                <th scope="col">Gaji</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">
                    <?= $employee['employee_id']; ?>
                </th>
                <td>
                    <?= $employee['name']; ?>
                </td>
                <td>
                    <?= $employee['position']; ?>
                </td>
                <td>
                    <?= formatRupiah($employee['salary']); ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>



<?= $this->endSection(); ?>