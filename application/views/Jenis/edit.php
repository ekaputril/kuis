<?php $this->load->view('layout/base_start') ?>

<div class="container">
  <legend>Edit Data jenis</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart('jenis/update/'.$data->id_kamera); ?>

    <?php echo form_hidden('id_kamera', $data->id_kamera) ?>
    
  	<div class="form-group">
      <label for="jenis">jenis kamera</label>
      <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan jenis kamera"
        value="<?php echo $data->gelar ?>">
    </div>

    <?php echo $error;?>

    <a class="btn btn-info" href="<?php echo site_url('jenis/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>

  <?php echo form_close(); ?>
  </div>
</div>