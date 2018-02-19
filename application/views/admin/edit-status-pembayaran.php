<h2>Edit Data Status pembayaran</h2>
<section>
<?php 
echo form_open('user/status-pembayaran/edit?id_status='.$detail->id_status_pembayaran,'edit_status_pembayaran');
echo "<div class='form-group ".$this->session->flashdata('Tnm_status_pembayaran')."'>".form_input('Nama status pembayaran :','Min. 6 karakter','Tnm_status_pembayaran',set_value('Tnm_status_pembayaran',$detail->nm_status_pembayaran));
echo form_error('Tnm_status_pembayaran','<span class="help-block">','</span>');
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-plus-sign'></span> Simpan</button>
<a class='btn btn-primary' href='<?php echo base_url()."user/status-pembayaran"; ?>'><span class='glyphicon glyphicon-list'></span> Daftar Status Pembayaran</a>
<?php echo form_close(); ?>
</section>
</div>
</body>
</html>
