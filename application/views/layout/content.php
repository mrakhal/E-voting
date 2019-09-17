<?php if (!defined('BASEPATH'))exit('No Direct script access allowed');
?>
<div class="content-wrapper">
<!--
<div style="background-image: url('<?php echo base_url('assets/images/kl.jpg');?>'); img-responsive pad; no-repeat center center fixed; background-size: cover;">
-->

<div class="box-body">
<div class="box-body col-md-12" >

<div class="box-body col-md-1">
</div>
<div class="box-body col-md-10">
<?php
  if($isi) {
    $this->load->view($isi);
  }
  else{
    $this->load->view('listpost');
  }
?>
</div>

</div>
<div class="box-body col-md-1">
</div>

</div>
</div>
</div>

</div>
