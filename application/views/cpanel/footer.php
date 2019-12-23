<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?=date('Y');?>.</strong> All rights reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>cpanel_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>cpanel_assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>cpanel_assets/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url()?>cpanel_assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?=base_url()?>cpanel_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url()?>cpanel_assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>cpanel_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>cpanel_assets/bower_components/chart.js/Chart.js"></script>
<script src="<?=base_url()?>cpanel_assets/bower_components/ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>cpanel_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>cpanel_assets/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>cpanel_assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>cpanel_assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>cpanel_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        // instance, using default configuration.
        CKEDITOR.replace('content_ck');
        //bootstrap WYSIHTML5 - text editor
        $('.wik_textarea').wysihtml5();
    })
</script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('.datatable').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            "columnDefs": [
                { "orderable": false, "targets": 0 }
            ]
        })
    })
</script>
</body>
</html>
