<br/>
<fieldset>
<legend><h2>Data Status Produk</h2></legend>
<?php echo $this->session->flashdata('pesan'); ?>
<a class="btn btn-success" href="#tambah"><span class="glyphicon glyphicon-plus-sign"></span> Tambah status produk</a>
<table class="table table-striped table-bordered">
<tr>
<td>No</td>
<td>Nama status produk</td>
<td colspan=2>Aksi</td>
</tr>
<?php
	$no=1;
	if(is_array($laporan)){	
		foreach($laporan as $lap){?>
				<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $lap->nm_status_produk; ?></td>
				<td><a href="<?php echo base_url(); ?>user/status-produk/edit?id_status=<?php echo $lap->id_status_produk; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#konfirmasi<?php echo $lap->id_status_produk; ?>">
				<span class="glyphicon glyphicon-remove"></span> Hapus
				</button>
				<div id="konfirmasi<?php echo $lap->id_status_produk; ?>" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Peringatan!</h4>
				</div>
				<div class="modal-body">
				<p>Apakah Anda yakin ingin menghapus status produk <b><?php echo $lap->nm_status_produk; ?></b> dari sistem?</p>
				</div>
				<div class="modal-footer float-right">
				<a href="<?php echo base_url(); ?>user/status-produk/hapus?id_status=<?php echo $lap->id_status_produk; ?>" class="btn btn-danger">    Ya    </a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
				</div></div></div></div></td></tr>
				<?php
				$no++;
			}
		}
	else echo "<tr><td colspan=3>$laporan</td></tr>";
?>
</table>
</fieldset> 	
<br/>
<fieldset id='tambah'>
<legend><h2>Tambah Data Baru </h2></legend>
<?php 
echo form_open('user/status-produk','tambah-status-produk');
echo "<div class='form-group ".$this->session->flashdata('Tnm_status_produk')."'>".form_input('Nama status produk ','Min. 6 karakter','Tnm_status_produk',set_value('Tnm_status_produk'));
echo form_error('Tnm_status_produk','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan</button>
</form>
</fieldset>
