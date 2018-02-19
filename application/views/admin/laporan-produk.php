<br>
<fieldset>
<legend><h2>Data Produk</h2></legend>
<?php echo $this->session->flashdata('pesan'); ?>
<a class='btn btn-success' href='#tambah'><span class='glyphicon glyphicon-plus-sign'></span> Tambah Produk</a>
<table class='table table-striped table-bordered'>
<tr>
<td>No</td>
<td>Kode Produk</td>
<td>Tipe</td>
<td>Foto</td>
<td>Status</td>
<td colspan=3>Aksi</td>
</tr>
<?php
	$no=1;
	if(is_array($laporan)){
		foreach($laporan as $lap){
				if($lap->id_status_produk == 2) $tombol_produk = " <a href='".base_url()."user/produk/aktif?id_produk=".$lap->id_produk."' class='btn btn-primary'><span class='glyphicon glyphicon-menu-hamburger'></span> Aktifkan Produk</a>";
				else
				if($lap->id_status_produk == 1) $tombol_produk = " <a href='".base_url()."user/produk/nonaktif?id_produk=".$lap->id_produk."' class='btn btn-warning'><span class='glyphicon glyphicon-menu-hamburger'></span> Non-aktifkan Produk</a>";
				else $tombol_produk=null;?>
				<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $lap->id_produk; ?></td>
				<td><?php echo $lap->nm_tipe; ?></td>
				<td><img src="<?php echo base_url(); ?>produk/<?php echo $lap->gambar; ?>" width="200" height="150" /></td>
				<td><?php echo $lap->nm_status_produk; ?></td>
				<td><a href="<?php echo base_url(); ?>user/produk/edit?id_produk=<?php echo $lap->id_produk; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#konfirmasi<?php echo $lap->id_produk; ?>">
				<span class="glyphicon glyphicon-remove"></span> Hapus</button>
				<div id="konfirmasi<?php echo $lap->id_produk; ?>" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Peringatan!</h4>
				</div>
				<div class="modal-body">
				<p>Apakah Anda yakin ingin menghapus produk ini dari sistem?</p>
				</div>
				<div class="modal-footer float-right">
				<a href="<?php echo base_url(); ?>user/produk/hapus?id_produk=<?php echo $lap->id_produk; ?>" class="btn btn-danger">    Ya    </a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
				</div></div></div></div>
				<a href="<?php echo base_url(); ?>user/produk/detail?id_produk=<?php echo $lap->id_produk; ?>" class="btn btn-info"><span class="glyphicon glyphicon-menu-hamburger"></span> Lihat Detail</a><?php echo $tombol_produk; ?></td></tr>
				<?php
				$no++;
			}
		}
	else echo "<tr><td colspan=6>$laporan</td></tr>";
?>
</table>
</fieldset> 	
<br/>
<fieldset id='tambah'>
<legend><h2>Tambah Data Baru </h2></legend>
<?php 
$ugambar = array('class'=>'form-control');
echo form_open_multipart('user/produk','tambah-produk');
echo "<div class='form-group ".$this->session->flashdata('Ctipe')."'>".form_dropdown('Tipe Produk ','Ctipe',$tipe,set_select('Ctipe','0'));
echo form_error('Ctipe','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Ugambar')."'><label for='Ugambar' class='label-control'>Foto Produk </label>".form_upload('Ugambar',set_value('Ugambar'),$ugambar);
echo '<span class="help-block">'.$this->session->flashdata('Ugambar_err').'</span>';
echo "</div>";

?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan</button>
<button type="reset" id="Breset" class="btn btn-danger"><span class='glyphicon glyphicon-repeat'></span> Ulangi</button>
</form>
</fieldset>
