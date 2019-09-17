<?php
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<div class="box-body col-md-12">
  <div class="box box-primary">
    <center>
      <h3>Masukkan Username & Password Admin Untuk Membuka Hasil Pemungutan Suara </h3>
    <div class="box-body col-md-3">
    </div>
    <div class="box-body col-md-6">
    <form class="form-horizontal" method="post" action="<?php echo site_url('dashboard/lihatsuara/');?>">
      <table>
        <tr>
          <td>
            <input type="text" class="form-control" name="username" placeholder="username">
          </td>
          <td>
            <input type="password" class="form-control" name="password" placeholder="password">
          </td>
          <td>
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="GO">
          </td>
        </tr>
      </table>
    </form>
    </div>
    <div class="box-body col-md-3">
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="box box-primary">
      <font size='100'>
        <h2>Perhitungan Mundur</h2>
        <p id="count"></p>
      </font>
    </div>
    <div class="box box-primary">
    </div>
  </div>
</div>



<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $deadline; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("count").innerHTML = hours + " : "
    + minutes + " : " + seconds ;

    // If the count down is over, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("count").innerHTML = "GO";
        document.location = "<?php echo site_url('dashboard/suara/'.$key); ?>";
    }
}, 1000);
</script>
