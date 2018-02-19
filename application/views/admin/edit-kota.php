<h2>Edit Data Tarif Kota</h2>
<section>
<div class="alert alert-info">* Wajib diisi</div>
<?php 
echo form_open('user/kota/edit?id_kota='.$detail->id_kota,'edit_kota');
echo "<div class='form-group ".$this->session->flashdata('Tnm_kota')."'>".form_input('Nama Kota :','Min. 6 karakter','Tnm_kota',set_value('Tnm_kota',$detail->nm_kota));
echo form_error('Tnm_kota','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Thrg_kota')."'>".form_input('Tarif kota :','Rp.','Thrg_kota',set_value('Thrg_kota',$detail->hrg_kota));
echo form_error('Thrg_kota','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan</button>
<a class='btn btn-primary' href='<?php echo base_url()."user/kota"; ?>'><span class='glyphicon glyphicon-list'></span> Daftar Tarif Kota</a>
<?php echo form_close(); ?>
</section>
</div>
</body>
</html>
