<!-- BOOTSTRAP 5 -->
<script src="<?= base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- jQuery -->
<script src="<?= base_url('assets/jquery/dist/jquery.min.js'); ?>"></script>

<!-- DATATABLES JS -->
<script src="<?= base_url('assets/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>

<!-- SWEETALERT -->
<script src="<?= base_url('assets/sweetalert2/dist/sweetalert2.all.min.js'); ?>"></script>

<!-- BUTTON -->
<script src="<?= base_url('assets/js/button.js'); ?>"></script>

<!-- ALERT COMPONENTS -->
<?= $this->include('components/alert'); ?>

<script>
    $(document).ready(function () {
        $('#dataEmployees').DataTable({
            responsive: true
        });
    });
</script>