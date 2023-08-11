</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Sistem Informasi Pembelian Pupuk</strong>
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
<!-- Summernote -->
<script src="<?= base_url('assets/template/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function() {
    // Summernote
    $('#summernote').summernote()
    $('#summernote1').summernote()
    $('#summernote2').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

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
</body>

</html>