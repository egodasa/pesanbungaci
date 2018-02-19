<br/>
<fieldset>
<legend><h2>Data Tipe Produk</h2></legend>
<?php echo $this->session->flashdata('pesan'); ?>
<a class='btn btn-success' href='#tambah'><span class='glyphicon glyphicon-plus-sign'></span> Tambah Tipe Produk</a>
<table class='table table-striped table-bordered'>
<tr>
<td>No</td>
<td>Nama Tipe</td>
<td>Tarif</td>
<td colspan=2>Aksi</td>
</tr>
<?php
	$no=1;
	if(is_array($laporan)){
		foreach($laporan as $lap){?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $lap->nm_tipe; ?></td>
				<td>Rp <?php echo number_format($lap->hrg_tipe,2,",","."); ?></td>
				<td><a href="<?php echo base_url(); ?>user/tipe-produk/edit?id_tipe=<?php echo $lap->id_tipe; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#konfirmasi<?php echo $lap->id_tipe; ?>">
				<span class="glyphicon glyphicon-remove"></span> Hapus
				</button>
				<div id="konfirmasi<?php echo $lap->id_tipe; ?>" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Peringatan!</h4>
				</div>
				<div class="modal-body">
				<p>Apakah Anda yakin ingin menghapus tipe produk <b><?php echo $lap->nm_tipe; ?></b> dari sistem?</p>
				</div>
				<div class="modal-footer float-right">
				<a href="<?php echo base_url(); ?>user/tipe-produk/hapus?id_tipe=<?php echo $lap->id_tipe; ?>" class="btn btn-danger">    Ya    </a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
				</div></div></div></div></td></tr>
			<?php
			$no++;}
		}
		else echo "<tr><td colspan=4>$laporan</td></tr>"
			
?>
</table>
</fieldset> 	
<br/>
<fieldset id='tambah'>
<legend><h2>Tambah Data Baru</h2></legend>
<?php 
echo form_open('user/tipe-produk','tambah_tipe_produk');
echo "<div class='form-group ".$this->session->flashdata('Tnm_tipe')."'>".form_input('Nama Tipe Produk ','Min. 3 karakter','Tnm_tipe',set_value('Tnm_tipe'));
echo form_error('Tnm_tipe','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Thrg_tipe')."'>".form_input('Tarif Tipe Produk ','Rp.','Thrg_tipe',set_value('Thrg_tipe'));
echo form_error('Thrg_tipe','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan</button>
</form>
</fieldset>
