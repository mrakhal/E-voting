<?php
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<center>
	<h3>Pilih Calon KAHIM</h3>
	<div class="box-body col-md-2">
	</div>

<?php foreach ($calon as $key => $list):
    $id = $list['no']; ?>
            <div class="box-body col-md-4">
							<ul class="products-list product-list-in-box">
								<div class="box box-primary">
									<h1 align="center"><?php echo $list['no']; ?></h1>
									<div class="box-body">
										<div class="box box-primary" align="center">

											<img class="img-responsive pad" src="<?php echo base_url();?>assets/uploads/files/<?php echo $list['photo']; ?>" alt="Photo" >
											<br>

											<form class="form" method="post" action="<?php echo site_url('pemilihan/setbem/');?>">
												<input type="hidden" name="id" id="id" value="<?php cetak($id);?>">
												<input type="button" name="submit" id="submit" class="btn btn-primary" value="<?php echo $list['nama']; ?>"
												data-toggle="modal" data-target="#myModal<?php cetak($id);?>">
											</form>
										</div>
									</div>
								</div>
							</ul>
							<div class="modal fade" id="myModal<?php cetak($id);?>" role="dialog">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Yakin Dengan Pilihan Anda ?</h4>
										</div>
										<div class="modal-body">
											<p><?php echo $list['nama']; ?></p>
										</div>
										<div class="modal-footer">
											<form class="form" method="post" action="<?php echo site_url('pemilihan/setbem/');?>">
												<input type="hidden" name="id" id="id" value="<?php cetak($id);?>">
												<input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancel">
												<input type="submit" name="submit" id="submit" class="btn btn-primary" value="YA">
											</form>
										</div>
									</div>
								</div>
							</div>
          </div>
<?php endforeach; ?>

	<div class="box-body col-md-2">
	</div>
