<br/>
<fieldset>
<legend><h2>Data Jenis Acara</h2></legend>
<?php echo $this->session->flashdata('pesan'); ?>
<a class='btn btn-success' href='#tambah'><span class='glyphicon glyphicon-plus-sign'></span> Tambah Jenis Acara</a>
<table class='table table-striped table-bordered'>
<tr>
<td>No</td>
<td>Nama Acara</td>
<td colspan=2>Aksi</td>
</tr>
<?php
	$no=1;
	if(is_array($laporan)){
		foreach($laporan as $lap){?>
				<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $lap->nm_acara; ?></td>
				<td><a href="<?php echo base_url(); ?>user/jenis-acara/edit?id_acara=<?php echo $lap->id_acara; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#konfirmasi<?php echo $lap->id_acara; ?>">
				<span class="glyphicon glyphicon-remove"></span> Hapus
				</button>
				<div id="konfirmasi<?php echo $lap->id_acara; ?>" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Peringatan!</h4>
				</div>
				<div class="modal-body">
				<p>Apakah Anda yakin ingin menghapus jenis acara <b><?php echo $lap->nm_acara; ?></b> dari sistem??</p>
				</div>
				<div class="modal-footer float-right">
				<a href="<?php echo base_url(); ?>user/jenis-acara/hapus?id_acara=<?php echo $lap->id_acara; ?>" class="btn btn-danger">    Ya    </a>
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
<fieldset id='tambah'>
<legend><h2>Tambah Data Baru</h2></legend>
<?php 
echo form_open('user/jenis-acara','tambah-jenis-acara');
echo "<div class='form-group ".$this->session->flashdata('Tnm_acara')."'>".form_input('Nama Jenis Acara ','Min. 6 karakter','Tnm_acara',set_value('Tnm_acara',null));
echo form_error('Tnm_acara','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan</button>
</form>
</fieldset>
