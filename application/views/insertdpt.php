<form class="insertdpt role="form" method="POST" action="<?php echo site_url('inputdpt/tambah_aksi') ?>" validate-form">
  <div class="form-group">
    <label for="exampleInputnim">NIM</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nim" aria-describedby="emailHelp" placeholder="Masukkkan Nim Anda">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Status</label>
    <select class="form-control" id="exampleFormControlSelect1" name="status">
      <option>daftar</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
