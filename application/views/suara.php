<?php
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<?php foreach ($bem as $key => $v) {
	$total += $v['suara'];
} ?>
	<h3 style="margin-left: 30px;">Hasil Pemilihan KAHIM</h3>
<?php foreach ($bem as $key => $list) {
	$suara = $list['suara']/$total*100;
	?>
	<div class="box-body col-md-6">
		<ul class="products-list product-list-in-box">
			<div class="box box-primary">
				<h3 align="center"><?php echo $list['no'].'. '.$list['nama']; ?></h3>
				<div class="box-body">
					<div class="box box-primary col-xs-12" align="center">

						<img class="img-responsive pad" src="<?php echo base_url();?>assets/uploads/files/<?php echo $list['photo']; ?>" alt="Photo" >
					</div>
					<div class="box box-primary col-xs-12">
						<h1 align="center"><?php echo $list['suara'].' suara <br>'.number_format($suara,2).'%'; ?></h1>
					</div>
				</div>
			</div>
		</ul>
	</div>

<?php } ?>
