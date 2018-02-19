<h2>Edit Data Status Transaksi</h2>
<section>
<div class="alert alert-info">* Wajib diisi</div>
<?php 
echo form_open('user/status-transaksi/edit?id_status='.$detail->id_status_transaksi,'edit_status_transaksi');
echo "<div class='form-group ".$this->session->flashdata('Tnm_status_transaksi')."'>".form_input('Nama status transaksi :','Min. 6 karakter','Tnm_status_transaksi',set_value('Tnm_status_transaksi',$detail->nm_status_transaksi));
echo form_error('Tnm_status_transaksi','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan</button>
<a class='btn btn-primary' href='<?php echo base_url()."user/status-transaksi"; ?>'><span class='glyphicon glyphicon-list'></span> Daftar Status Transaksi</a>
<?php echo form_close(); ?>
</section>
</div>
</body>
</html>
