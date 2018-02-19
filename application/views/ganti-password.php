<br/>
<section>
<fieldset>
<legend><h2>Ganti Password</h2></legend>
<?php
echo form_open('user/ganti-password','ganti-password');
echo "<div class='form-group ".$this->session->flashdata('Tsandi_lama')."'>".form_password('Kata Sandi Lama ','Masukkan Kata Sandi Lama Anda','Tsandi_lama');
echo form_error('Tsandi_lama','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tsandi1')."'>".form_password('Kata Sandi Baru','Min. 6 karakter','Tsandi1');
echo form_error('Tsandi1','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tsandi2')."'>".form_password('Ulangi Kata Sandi Baru','','Tsandi2');
echo form_error('Tsandi2','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success">Ganti Password</button>
<a href="<?php echo base_url(); ?>user/profil" class="btn btn-primary">Kembali Halaman Profil</a>
<?php echo form_close(); ?>
</fieldset>
</section>
