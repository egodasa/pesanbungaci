<h2>Tambah Pengguna</h2>
<section>
<?php echo $this->session->flashdata('pesan'); 
echo form_open('user/pengguna/tambah','pengguna');
echo "<div class='form-group ".$this->session->flashdata('Tusername')."'>".form_input('Username ','Min. 6 karakter tanpa spasi','Tusername',set_value('Tusername',null));
echo form_error('Tusername','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tsandi1')."'>".form_password('Kata Sandi ','Min. 6 karakter','Tsandi1',set_value('Tsandi1',null));
echo form_error('Tsandi1','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tsandi2')."'>".form_password('Ulangi Kata Sandi ','','Tsandi2',set_value('Tsandi2',null));
echo form_error('Tsandi2','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tnm_pengguna')."'>".form_input('Nama Pengguna ','','Tnm_pengguna',set_value('Tnm_pengguna',null));
echo form_error('Tnm_pengguna','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Cjenis')."'>".form_dropdown('Jenis ','Cjenis',$jenis,set_select('Cjenis','0'));
echo form_error('Cjenis','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tnohp')."'>".form_input('Nomor Handphone ','Contoh  08123455667','Tnohp',set_value('Tnohp',null));
echo form_error('Tnohp','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Temail')."'>".form_input('Email [Kosongkan Jika tidak punya]','Contoh  email@email.com','Temail',set_value('Temail',null));
echo form_error('Temail','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Tambah Pengguna</button>
<a class='btn btn-primary' href='<?php echo base_url()."user/pengguna"; ?>'><span class='glyphicon glyphicon-list'></span> Daftar Pengguna</a>
<?php echo form_close(); ?>
</section>
</div>
</body>
</html>
