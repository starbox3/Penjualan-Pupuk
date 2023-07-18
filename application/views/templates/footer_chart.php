</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Sistem Informasi Arsip Digital</strong>
    <div class="float-right d-none d-sm-inline-block">

    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?= base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/template/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/template/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/template/') ?>dist/js/demo.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/template/') ?>plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url('assets/template/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/template/') ?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/template/') ?>plugins/toastr/toastr.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/template/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/template/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url('assets/template/') ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('assets/template/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/template/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/template/') ?>plugins/chart.js/Chart.min.js"></script>


<script>
    <?= $this->session->flashdata('messageEdit'); ?>
    <?= $this->session->flashdata('messageAdd'); ?>
    <?= $this->session->flashdata('messageApiError'); ?>
    <?= $this->session->flashdata('messageApiSucces'); ?>
    <?= $this->session->flashdata('messageSendwa'); ?>
    <?= $this->session->flashdata('messageDelete'); ?>
    <?= $this->session->flashdata('messagePasswordSalah'); ?>
    <?= $this->session->flashdata('messagePasswordTidakSama'); ?>
    <?= $this->session->flashdata('messageNoSelect'); ?>
    <?= $this->session->flashdata('messageErrorExcel'); ?>
    <?= $this->session->flashdata('messageIdSama'); ?>
</script>
<script>
    function selectAll(input) {
        let checkboxes = document.querySelectorAll('.idName');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = input.checked;
        })
    }
</script>
<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>

<script>
    $('.form-customer').on('click', function() {
        const idApi = $(this).data('api');
        const idPaket = $(this).data('paket');
        $.ajax({
            url: "<?= base_url('user/changeApiCustomer'); ?>",
            type: 'post',
            data: {
                idApi: idApi,
                idPaket: idPaket
            },
            success: function() {
                document.location.href = "<?= base_url('user/Customer'); ?>";
            }
        });
    });
</script>

<script>
    $(function() {
        bsCustomFileInput.init();
        $('[data-mask]').inputmask()
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    });
</script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'yy-MM-DD'
        });
        $('#reservationdate1').datetimepicker({
            format: 'yy-MM-DD'
        });
        $('#reservationdate2').datetimepicker({
            format: 'YYYY'
        });
        //Date range picker
        $('#reservation').daterangepicker({
            locale: {
                format: 'yy-MM-DD'
            }
        })
    })
</script>
<?php
if ($periode1 == null) {
    $y = 2023;
} else {
    $y = $periode1;
};
if ($tipe == null) {
    $t = 'tbl_surat_masuk';
}
if ($tipe == 1) {
    $t = 'tbl_surat_masuk';
}
if ($tipe == 2) {
    $t = 'tbl_surat_keluar';
};
$kel1 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 01 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=1");
$kem1 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 01 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=2");
$kelbulan1 = $kel1->num_rows();
$kembulan1 = $kem1->num_rows();
$kel2 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 02 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=1");
$kem2 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 02 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=2");
$kelbulan2 = $kel2->num_rows();
$kembulan2 = $kem2->num_rows();
$kel3 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 03 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=1");
$kem3 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 03 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=2");
$kelbulan3 = $kel3->num_rows();
$kembulan3 = $kem3->num_rows();
$kel4 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 04 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=1");
$kem4 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 04 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=2");
$kelbulan4 = $kel4->num_rows();
$kembulan4 = $kem4->num_rows();
$kel5 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 05 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=1");
$kem5 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 05 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=2");
$kelbulan5 = $kel5->num_rows();
$kembulan5 = $kem5->num_rows();
$kel6 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 06 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=1");
$kem6 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 06 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=2");
$kelbulan6 = $kel6->num_rows();
$kembulan6 = $kem6->num_rows();
$kel7 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 07 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=1");
$kem7 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 07 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=2");
$kelbulan7 = $kel7->num_rows();
$kembulan7 = $kem7->num_rows();
$kel8 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 08 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=1");
$kem8 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 08 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=2");
$kelbulan8 = $kel8->num_rows();
$kembulan8 = $kem8->num_rows();
$kel9 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 09 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=1");
$kem9 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 09 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=2");
$kelbulan9 = $kel9->num_rows();
$kembulan9 = $kem9->num_rows();
$kel10 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 10 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=1");
$kem10 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 10 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=2");
$kelbulan10 = $kel10->num_rows();
$kembulan10 = $kem10->num_rows();
$kel11 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 11 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=1");
$kem11 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 11 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=2");
$kelbulan11 = $kel11->num_rows();
$kembulan11 = $kem11->num_rows();
$kel12 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 12 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=1");
$kem12 = $this->db->query("SELECT * FROM `$t` WHERE MONTH(`tanggal_surat`) = 12 AND YEAR(`tanggal_surat`) = $y AND `tipe_surat`=2");
$kelbulan12 = $kel12->num_rows();
$kembulan12 = $kem12->num_rows();
?>
<script>
    $(function() {
        var areaChartData = {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                    label: 'Kelahiran',
                    backgroundColor: 'rgba(255, 255, 0, 1)',
                    borderColor: 'rgba(0, 0, 0, 1)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(255, 255, 0, 1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(255, 255, 0, 1)',
                    data: [<?= $kelbulan1 ?>, <?= $kelbulan2 ?>, <?= $kelbulan3 ?>, <?= $kelbulan4 ?>, <?= $kelbulan5 ?>, <?= $kelbulan6 ?>, <?= $kelbulan7 ?>, <?= $kelbulan8 ?>, <?= $kelbulan9 ?>, <?= $kelbulan10 ?>, <?= $kelbulan11 ?>, <?= $kelbulan12 ?>, ]
                },
                {
                    label: 'Kematian',
                    backgroundColor: 'rgba(255, 0, 0, 1)',
                    borderColor: 'rgba(0, 0, 0, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(255, 0, 0, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(255, 0, 0, 1)',
                    data: [<?= $kembulan1 ?>, <?= $kembulan2 ?>, <?= $kembulan3 ?>, <?= $kembulan4 ?>, <?= $kembulan5 ?>, <?= $kembulan6 ?>, <?= $kembulan7 ?>, <?= $kembulan8 ?>, <?= $kembulan9 ?>, <?= $kembulan10 ?>, <?= $kembulan11 ?>, <?= $kembulan12 ?>, ]
                },
            ]
        }
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    })
</script>
</body>

</html>