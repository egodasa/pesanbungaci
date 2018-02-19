<h2>Edit Jenis Pengguna</h2>
<section>
<div class="alert alert-info">* Wajib diisi</div>
<?php
echo form_open('user/jenis-pengguna/edit?id_jenis='.$detail->id_jenis,'edit_jenis_pengguna');
echo "<input type='hidden' name='edit_jenis_pengguna' id='edit_jenis_pengguna' value='".$detail->id_jenis."'/>";
echo "<div class='form-group ".$this->session->flashdata('Tnm_jenis')."'>".form_input('Edit Nama Jenis Pengguna :','Min. 6 karakter','Tnm_jenis',set_value('Tnm_jenis',$detail->nm_jenis));
echo form_error('Tnm_jenis','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan Perubahan</button>
<a class='btn btn-primary' href='<?php echo base_url()."user/jenis-pengguna"; ?>'><span class='glyphicon glyphicon-list'></span> Daftar Jenis Pengguna</a>
<?php echo form_close(); ?>
</section>
</div>
</body>
</html>
