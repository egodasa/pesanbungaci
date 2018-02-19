<h2>Edit Data Tipe Produk</h2>
<section>
<div class="alert alert-info">* Wajib diisi</div>
<?php 
echo form_open('user/tipe-produk/edit?id_tipe='.$detail->id_tipe,'edit_tipe_produk');
echo "<div class='form-group ".$this->session->flashdata('Tnm_tipe')."'>".form_input('Nama Tipe Produk :','Min. 3 karakter','Tnm_tipe',set_value('Tnm_tipe',$detail->nm_tipe));
echo form_error('Tnm_tipe','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Thrg_tipe')."'>".form_input('Tarif Tipe Produk :','Rp.','Thrg_tipe',set_value('Thrg_tipe',$detail->hrg_tipe));
echo form_error('Thrg_tipe','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan</button>
<a class='btn btn-primary' href='<?php echo base_url()."user/tipe-produk"; ?>'><span class='glyphicon glyphicon-list'></span> Daftar Tipe Produk</a>
<?php echo form_close(); ?>
</section>
</div>
</body>
</html>
