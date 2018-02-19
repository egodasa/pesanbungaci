<br/>
<fieldset>
<legend><h2>Data Kota</h2></legend>
<?php echo $this->session->flashdata('pesan'); ?>
<div class="form-group">
	<a class='btn btn-success' href='#tambah'><span class='glyphicon glyphicon-plus-sign'></span> Tambah Kota</a>
<div class="btn-group">
  <button type="button" class="btn btn-default">Tampilkan Data Berdasarkan </button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="?urutkan=kota_asc">Nama Kota A - Z</a></li>
    <li><a href="?urutkan=kota_desc">Nama Kota Z - A</a></li>
    <li><a href="?urutkan=tarif_asc">Tarif Terkecil</a></li>
    <li><a href="?urutkan=tarif_desc">Tarif Terbesar</a></li>
  </ul>
</div>
</div>
<form class="form-inline" method="GET" action="<?php echo base_url(); ?>user/kota?cari=<?php echo $this->input->get('cari'); ?>">
  <div class="form-group">
    <label for="cari">Pencarian Data Kota : </label>
    <input type="text" class="form-control" name="cari">
		<div class="btn-group">
    <button type="submit" class="btn btn-primary">Cari</button>
    <a href="<?php echo base_url(); ?>user/kota" class="btn btn-success">Reset</a>
    </div>
  </div>
</form>
<table class='table table-striped table-bordered'>
<tr>
<td>No</td>
<td>Nama Kota</td>
<td>Tarif</td>
<td colspan=2>Aksi</td>
</tr>
<?php
	$no=1;
	if(is_array($laporan)){
	foreach($laporan as $lap){?>
				<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $lap->nm_kota; ?></td>
				<td>Rp <?php echo number_format($lap->hrg_kota,2,",","."); ?></td>
				<td><a href="<?php echo base_url(); ?>user/kota/edit?id_kota=<?php echo $lap->id_kota; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#konfirmasi<?php echo $lap->id_kota; ?>">
				<span class="glyphicon glyphicon-remove"></span> Hapus
				</button>
				<div id="konfirmasi<?php echo $lap->id_kota; ?>" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Peringatan!</h4>
				</div>
				<div class="modal-body">
				<p>Apakah Anda yakin ingin menghapus kota <b><?php echo $lap->nm_kota; ?></b> dari sistem?</p>
				</div>
				<div class="modal-footer float-right">
				<a href="<?php echo base_url(); ?>user/kota/hapus?id_kota=<?php echo $lap->id_kota; ?>" class="btn btn-danger">    Ya    </a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
				</div></div></div></div></td></tr>
				<?php
				$no++;
			}
		}
		else echo "<tr><td colspan=4>$laporan</td></tr>";
?>
</table>
</fieldset> 	
<br/>
<fieldset id='tambah'>
<legend><h2>Tambah Data Baru</h2></legend>
<?php 
echo form_open('user/kota','tambah-jenis-pengguna');
echo "<div class='form-group ".$this->session->flashdata('Tnm_kota')."'>".form_input('Nama Kota ','Min. 6 karakter','Tnm_kota',set_value('Tnm_kota'));
echo form_error('Tnm_kota','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Thrg_kota')."'>".form_input('Tarif kota ','Rp.','Thrg_kota',set_value('Thrg_kota'));
echo form_error('Thrg_kota','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan</button>
</form>
</fieldset>
