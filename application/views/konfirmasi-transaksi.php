<br/>
<fieldset>
	<legend><h2>Konfirmasi Pembayaran</h2></legend>
<section>
<?php
echo $this->session->flashdata('pesan'); 
echo form_open_multipart('user/transaksi/konfirmasi?id_transaksi='.$detail->id_transaksi,'konfirmasi-pesan');
?>
<div class='form-group'>
<label for="Tid_pesan" class="label-control">ID Transaksi </label>
<input id="Tid_transaksi" class="form-control" type="text" name="Tid_transaksi" value="<?php echo $detail->id_transaksi; ?>" readonly  />
</div>
<div class='form-group'>
<label for="Tnm_pengirim" class="label-control">Nama Pengirim </label>
<input id="Tnm_pengirim" class="form-control" type="text" name="Tnm_pengirim" value="<?php echo $detail->nm_pengirim; ?>" readonly  />
</div>
<div class='form-group'>
<label for="Ttgl_pesan" class="label-control">Tanggal Pesan </label>
<input id="Ttgl_pesan" class="form-control" type="text" name="Ttgl_pesan" value="<?php echo $detail->tgl_pesan; ?>" readonly  />
</div>
<div class='form-group'>
<label for="Thrg_total" class="label-control">Biaya Total </label>
<input id="Thrg_total" class="form-control" type="text" name="Thrg_total" value="<?php echo $detail->hrg_total; ?>" readonly  />
</div>
<?php
$ubukti = array('class'=>'form-control');
echo "<div class='form-group ".$this->session->flashdata('Tnm_pembayar')."'>".form_input('Nama Pembayar ','','Tnm_pembayar',set_value('Tnm_pembayar'));
echo form_error('Tnm_pembayar','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tno_rekening')."'>".form_input('Nomor Rekening ','Contoh  123 456 789','Tno_rekening',set_value('Tno_rekening'));
echo form_error('Tno_rekening','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Ubukti')."'><label for='Ubukti' class='label-control'>Foto Bukti Pembayaran </label>".form_upload('Ubukti',set_value('Ubukti'),$ubukti);
echo '<span class="help-block">'.$this->session->flashdata('Ubukti_err').'</span>';
echo "</div>";
?>
<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-ok'></span> Konfirmasi Transaksi</button>
<a class='btn btn-primary' href='<?php echo base_url()."user/transaksi"; ?>'><span class='glyphicon glyphicon-list'></span> Kembali Ke Daftar ransaksi</a>
<?php echo form_close(); ?>
</section>
</fieldset>
