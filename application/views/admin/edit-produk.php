<br/>
<fieldset>
<legend><h2>Edit Data Produk :</h2></legend>
<?php
$ugambar = array('class'=>'form-control');
echo form_open_multipart('user/produk/edit?id_produk='.$detail->id_produk,'tambah-produk');
echo form_hidden('Tid_produk',set_value('Tid_produk',$detail->id_produk));
echo "<div class='form-group ".$this->session->flashdata('Ctipe')."'>".form_dropdown('Tipe Produk :','Ctipe',$tipe,$detail->id_tipe);
echo form_error('Ctipe','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Ugambar')."'><label for='Ugambar' class='label-control'>Foto Produk :</label>".form_upload('Ugambar',$detail->gambar,$ugambar);
echo '<span class="help-block">'.$this->session->flashdata('Ugambar_err').'</span>';
echo "</div>";

?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan Perubahan</button>
<a href="<?php echo base_url().'user/produk/detail/'.$detail->id_produk;?>" class="btn btn-primary">Kembali Ke Detail Produk</a>
</form>
</fieldset>
