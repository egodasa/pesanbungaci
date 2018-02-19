<br/>
<fieldset>
	<legend><h2>Pendaftaran</h2></legend>
<section>
<?php
$nohp = array('type'=>'number');
echo form_open('mendaftar','mendaftar');
echo "<div class='form-group ".$this->session->flashdata('Tusername')."'>".form_input('Username ','Min. 6 karakter tanpa spasi','Tusername',set_value('Tusername'));
echo form_error('Tusername','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tsandi1')."'>".form_password('Kata Sandi ','Min. 6 karakter','Tsandi1',set_value('Tsandi1'));
echo form_error('Tsandi1','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tsandi2')."'>".form_password('Ulangi Kata Sandi ','','Tsandi2',set_value('Tsandi2'));
echo form_error('Tsandi2','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tnm_pengguna')."'>".form_input('Nama Anda ','','Tnm_pengguna',set_value('Tnm_pengguna'));
echo form_error('Tnm_pengguna','<span class="help-block">','</span>');
echo "</div>";
echo "<div class='form-group ".$this->session->flashdata('Tnohp')."'>".form_input('Nomor Handphone ','Contoh  08123455667','Tnohp',set_value('Tnohp'));
echo form_error('Tnohp','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Temail')."'>".form_input('Email [Kosongkan Jika tidak punya]','Contoh  email@email.com','Temail',set_value('Temail'));
echo form_error('Temail','<span class="help-block">','</span>');
echo "</div>";

?>
<button type="submit" class="btn btn-success">Daftar Sekarang!</button>
<?php echo form_close(); ?>
</section>
</fieldset>
