<!-- jQuery 2.2.3-->
<?php $mhs = $this->session->userdata('nim');
if ($mhs) { ?>
  <script src="<?php echo base_url();?>assets/styles/plugins/jQuery/jquery-2.2.3.min.js"></script>
<?php } ?>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/styles/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/styles/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/styles/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/styles/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/styles/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/styles/dist/js/demo.js"></script>
</body>
</html>
