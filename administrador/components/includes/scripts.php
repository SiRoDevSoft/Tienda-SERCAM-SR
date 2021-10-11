<!-- jQuery 3 -->
<script src="<?=$url?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=$url?>/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=$url?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=$url?>/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Moment JS -->
<script src="<?=$url?>/assets/bower_components/moment/moment.js"></script>
<!-- DataTables -->
<script src="<?=$url?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=$url?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="<?=$url?>/assets/bower_components/chart.js/Chart.js"></script>
<!-- daterangepicker -->
<script src="<?=$url?>/assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?=$url?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?=$url?>/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?=$url?>/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Slimscroll -->
<script src="<?=$url?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=$url?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=$url?>/assets/dist/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="<?=$url?>/assets/bower_components/ckeditor/ckeditor.js"></script>
<!-- Active Script -->


<script>
        $(function(){
        /** agregar una clase activa y permanecer abierto cuando se selecciona */
        var url = window.location;
        
        // for sidebar menu entirely but not cover treeview
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');
      
        // for treeview
        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

      });
</script>
<!-- Data Table Initialize -->
<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false, 
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  }); 
</script>

<script>
  $(function(){
    //Initialize Select2 Elements
    $('.select2').select2()

    //CK Editor 
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
  });
</script>