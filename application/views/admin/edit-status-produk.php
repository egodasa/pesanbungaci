<h2>Edit Data Status Produk</h2>
<section>
<div class="alert alert-info">* Wajib diisi</div>
<?php 
echo form_open('user/status-produk/edit?id_status='.$detail->id_status_produk,'edit_status_produk');
echo "<div class='form-group ".$this->session->flashdata('Tnm_status_produk')."'>".form_input('Nama Status Produk :','Min. 6 karakter','Tnm_status_produk',set_value('Tnm_status_produk',$detail->nm_status_produk));
echo form_error('Tnm_status_produk','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan</button>
<a class='btn btn-primary' href='<?php echo base_url()."user/status-produk"; ?>'><span class='glyphicon glyphicon-list'></span> Daftar Status Produk</a>
<?php echo form_close(); ?>
</section>
</div>
</body>
</html>
