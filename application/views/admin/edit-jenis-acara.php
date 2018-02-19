<h2>Edit acara Acara</h2>
<section>
<div class="alert alert-info">* Wajib diisi</div>
<?php
echo form_open('user/jenis-acara/edit?id_acara='.$detail->id_acara,'edit_acara_acara');
echo "<input type='hidden' name='edit_acara_acara' id='edit_acara_acara' value='".$detail->id_acara."'/>";
echo "<div class='form-group ".$this->session->flashdata('Tnm_acara')."'>".form_input('Edit Nama acara acara :','Min. 6 karakter','Tnm_acara',set_value('Tnm_acara',$detail->nm_acara));
echo form_error('Tnm_acara','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan Perubahan</button>
<a class='btn btn-primary' href='<?php echo base_url()."user/jenis-acara"; ?>'><span class='glyphicon glyphicon-list'></span> Daftar Jenis Acara</a>
<?php echo form_close(); ?>
</section>
</div>
</body>
</html>
