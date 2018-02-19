<h2>Tambah Pengguna</h2>
<section>
<div class="alert alert-info">* Wajib diisi</div>
<?php echo $this->session->flashdata('pesan'); 
echo form_open_multipart('user/produk','tambah_produk');
echo "<div class='form-group ".$this->session->flashdata('Cjenis')."'>".form_dropdown('Jenis :','Cjenis',$jenis,set_select('Cjenis','0'));
echo form_error('Ctipe','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tnohp')."'>".form_input('Nomor Handphone :','Contoh : 08123455667','Tnohp',set_value('Tnohp',null));
echo form_error('Tnohp','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Temail')."'>".form_input('Email :','Contoh : email@email.com','Temail',set_value('Temail',null));
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
