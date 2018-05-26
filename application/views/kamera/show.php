<?php $this->load->view('layout/base_start') ?>

<div class="container">
  <legend>Lihat kamera</legend>
  <div class="content">
    <div class="form-group">
      <label for="nama">Nama kamera</label>
      <p><?php echo $data->nama ?></p>
    </div>
    <div class="form-group">
      <label for="foto">Foto</label>
      <p><img src="<?php echo base_url('assets/uploads/').$data->foto; ?>"></p>
      <p><?php echo $data->foto ?></p>
    </div>
    <div class="form-group">
      <label for="jenis">Jenis kamera</label>
      <p><?php echo $data->jenis ?></p>
    </div>
    <a class="btn btn-info" href="<?php echo site_url('barang/') ?>">Kembali</a>
  </div>
</div>
