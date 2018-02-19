<br/>
<fieldset>
<legend><h2>Data Jenis Pengguna</h2></legend>
<?php echo $this->session->flashdata('pesan'); ?>
<a class='btn btn-success' onclick="show()"><span class='glyphicon glyphicon-plus-sign'></span> Tambah Jenis Pengguna</a>
<fieldset id='tambah'>
<?php 
echo form_open('user/jenis-pengguna','tambah-jenis-pengguna');
echo "<div class='form-group ".$this->session->flashdata('Tnm_jenis')."'>".form_input('Nama Jenis Pengguna ','Min. 6 karakter','Tnm_jenis');
echo form_error('Tnm_jenis','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan</button>
</fieldset>
<table class='table table-striped table-bordered'>
<tr>
<td>No</td>
<td>Nama Jenis</td>
<td colspan=2>Aksi</td>
</tr>
<?php
	$no=1;
	if(is_array($laporan)){
	foreach($laporan as $lap){?>
				<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $lap->nm_jenis; ?></td>
				<td><a href="<?php echo base_url();?>user/jenis-pengguna/edit?id_jenis=<?php echo $lap->id_jenis; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#konfirmasi<?php echo $lap->id_jenis; ?>">
				<span class="glyphicon glyphicon-remove"></span> Hapus
				</button>
				<div id="konfirmasi<?php echo $lap->id_jenis; ?>" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Peringatan!</h4>
				</div>
				<div class="modal-body">
				<p>Apakah Anda yakin ingin menghapus jenis pengguna <b><?php echo $lap->nm_jenis; ?></b> dari sistem?</p>
				</div>
				<div class="modal-footer float-right">
				<a href="<?php echo base_url();?>user/jenis-pengguna/hapus?id_jenis=<?php echo $lap->id_jenis; ?>" class="btn btn-danger">    Ya    </a>
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
</form>
<script>
var tambah=document.getElementById("tambah");
tambah.style.display="none";	

function show() {
	if(tambah.style.display == "block"){
		tambah.style.display="none";
	} else tambah.style.display="block";
}
</script>
