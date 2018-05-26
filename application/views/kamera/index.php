<?php $this->load->view('admin/layout/base_start') ?>

<div class="container">
  <legend>Daftar kamera</legend>

  <?php echo form_open("kamera/index");?>
            <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" id="nama" name="nama" placeholder="Search for Nama kamera..." type="text" value="<?php echo set_value('book_name'); ?>" />
                </div>
                <div class="col-md-6">
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                    <a href="<?php echo base_url(). "kamera/index"; ?>" class="btn btn-primary">Show All</a>
                </div>
            </div>
        <?php echo form_close(); ?>

  <div class="col-xs-12 col-sm-12 col-md-12">
    
    <table class="table table-striped">
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>jenis</th>
        <th width="200">Foto</th>
        <th>
          <a class="btn btn-primary" href="<?php echo site_url('kamera/create/') ?>">
            Tambah
          </a>
        </th>
        <?php if (isset($kamera)) { ?>
      </thead>
      <tbody>
        <?php $number = 1; foreach($kamera as $row) { ?>
        <tr>
          <td>
            <a href="<?php echo site_url('kamera/show/'.$row->id_kamera) ?>">
              <?php echo $number++ ?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('kamera/show/'.$row->id_kamera) ?>">
              <?php echo $row->nama?>
            </a>
          </td>
          <td>
            <a href="<?php echo site_url('kamera/show/'.$row->id_kamera) ?>">
              <?php echo $row->jenis ?>
            </a>
          </td>
          <td>
              <img src="<?php echo base_url('assets/uploads/').$row->foto; ?>" style="display:block; width:100%; height:100%;">
          </td>
          <td>
            <?php echo form_open('kamera/destroy/'.$row->id_kamera); ?>
            <a class="btn btn-info" href="<?php echo site_url('kamera/edit/'.$row->id_kamera) ?>">
              Ubah
            </a>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            <?php echo form_close() ?>
          </td>
        </tr>
        <?php } ?>

      </tbody>
    </table>
    <?php echo $links; ?>
    <?php }
        else { ?>
        <div>Tidak Ada data kamera</div>
        <?php } ?>
  </div>
</div>
