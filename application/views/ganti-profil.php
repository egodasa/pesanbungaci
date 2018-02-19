<br/>
<fieldset>
<legend><h2>Ganti Profil</h2></legend>
<section>
<?php
echo $this->session->flashdata('pesan'); 
echo form_open('user/ganti-profil','ganti-profil');
echo "<input type='hidden' value='".$id_pengguna."' id='id_pengguna' name='id_pengguna' />";
?>
<div class='form-group'>
<label for="Tusername" class="label-control">Username</label>
<input id="Tusername" class="form-control" type="text" name="Tusername" value="<?php echo $username; ?>" readonly  />
</div>
<?php
echo "<div class='form-group ".$this->session->flashdata('Tnm_pengguna')."'>".form_input('Nama Pengguna ','','Tnm_pengguna',set_value('Tnm_pengguna',$nm_pengguna));
echo form_error('Tnm_pengguna','<span class="help-block">','</span>');
echo "</div>";
echo "<div class='form-group ".$this->session->flashdata('Tnohp')."'>".form_input('Nomor Handphone ','Contoh : 08123455667','Tnohp',set_value('Tnohp',$nohp));
echo form_error('Tnohp','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Temail')."'>".form_input('Email ','Contoh : email@email.com','Temail',set_value('Temail',$email));
echo form_error('Temail','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-ok'></span> Simpan Perubahan</button>
<a class='btn btn-primary' href='<?php echo base_url()."user/profil"; ?>'><span class='glyphicon glyphicon-list'></span> Kembali Ke Profil</a>
<?php echo form_close(); ?>
</section>
</div>
</fieldset>
</body>
</html>
