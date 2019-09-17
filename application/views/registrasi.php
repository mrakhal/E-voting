<?php
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<br>
		<?php echo $output; ?>
<br>

<script type="text/javascript">

	function daftarmhs (nim) {
		$.get('<?php echo site_url("registrasi/daftarmhs/"); ?>'+nim, function(data) {
			/*optional stuff to do after success */
			$('.gc-refresh').click()
		});
	}
	jQuery(document).ready(function($) {
		$(".grocery-crud-table").on("change",'.js_switch',function(){alert($(this).is(":checked"));});

	});
</script>
