<br/>
<fieldset>
	<legend><h2>Masuk</h2></legend>
<section>
<div class="alert alert-warning"><strong>Pesan!</strong><br/>Belum punya <b>Username</b> dan <b>Password</b>? Silahkan klik menu <a href="<?php echo base_url(); ?>mendaftar"><b>Daftar</b></a> untuk membuatnya.</div>
<?php
echo $this->session->flashdata('pesan');
echo form_error('Tkecocokan','<div class="alert alert-danger">','</div>');
echo form_open('masuk','masuk');
echo "<div class='form-group ".$this->session->flashdata('Tusername')."'>".form_input('Username ','','Tusername',set_value('Tusername'));
echo form_error('Tusername','<span class="help-block">','</span>');
?>
</div>
<?php
echo "<div class='form-group ".$this->session->flashdata('Tsandi')."'>".form_password('Kata Sandi ','','Tsandi');
echo form_error('Tsandi','<span class="help-block">','</span>');
?>
</div>
<button type="submit" class="btn btn-success">Login</button>
<?php echo form_close() ?>
</section>
</fieldset>
