<br/>
<fieldset>
	<legend><h2>Validasi Pembayaran</h2></legend>
<section>
<form class="form-horizontal" action="<?php echo base_url().'user/transaksi/validasi?id_transaksi='.$detail->id_transaksi; ?>" method="post">
<div class="form-group">
<label class="control-label col-sm-3" for="Tusername">ID Transaksi : </label>
<div class="col-sm-9">
<p class="form-control-static" id="Tusername" name="Tusername" ><?php echo $detail->id_transaksi; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="Temail">Nama Pembayar :</label>
<div class="col-sm-9">
<p class="form-control-static" id="Temail" name="Temail" ><?php echo $detail->nm_pembayar; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="Tno_rekening">Nomor Rekening :</label>
<div class="col-sm-9">
<p class="form-control-static" id="Tno_rekening" name="Tno_rekening" ><?php echo $detail->no_rek; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="Tnohp">Tanggal Konfirmasi :</label>
<div class="col-sm-9">
<p class="form-control-static" id="Tnohp" name="Tnohp" ><?php echo $detail->tgl_konfirmasi; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="Thrg_total">Total Biaya :</label>
<div class="col-sm-9">
<p class="form-control-static" id="Thrg_gogal" name="Thrg_total" ><?php echo "Rp.".number_format($detail->hrg_total,2,',','.'); ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" for="Tnohp">Bukti Pembayaran :</label>
<div class="col-sm-9">
<p class="form-control-static" id="Tnohp" name="Tnohp" ><img src="<?php echo base_url().'pembayaran/'.$detail->bukti; ?>" class="img img-responsive" /></p>
</div>
</div>
<a href="<?php echo base_url(); ?>user/transaksi/validasi/2?id_transaksi=<?php echo $this->input->get('id_transaksi');?>" class="btn btn-primary" id="validasi" name="validasi" value="2">Terima Pembayaran</a>
<a href="<?php echo base_url(); ?>user/transaksi/validasi/3?id_transaksi=<?php echo $this->input->get('id_transaksi');?>" class="btn btn-danger" id="validasi" name="validasi" value="2">Tolak Pembayaran</a>
</form>
</section>
<br />
</fieldset>
