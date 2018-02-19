<h1>Detail Transaksi</h1>
<section>
<legend>Data Transaksi</legend>
<form class="form-horizontal">
<div class="form-group">
<label class="control-label col-sm-2" for="Tusername">ID Transaksi  </label>
<div class="col-sm-9">
<p class="form-control-static" id="Tusername" name="Tusername" ><?php echo $detail->id_transaksi; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Tusername">Nama Pengguna  </label>
<div class="col-sm-9">
<p class="form-control-static" id="Tusername" name="Tusername" ><?php echo $detail->nm_pengguna." (".$detail->username.")"; ?> </p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Tnohp">Tanggal Pesan </label>
<div class="col-sm-9">
<p class="form-control-static" id="Tnohp" name="Tnohp" ><?php echo $detail->tgl_pesan; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Tnohp">Status Transaksi </label>
<div class="col-sm-9">
<p class="form-control-static" id="Tnohp" name="Tnohp" ><?php echo $detail->nm_status_transaksi; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Tnohp">Status Pembayaran </label>
<div class="col-sm-9">
<p class="form-control-static" id="Tnohp" name="Tnohp" ><?php echo $detail->nm_status_pembayaran; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Tnohp">Total Biaya</label>
<div class="col-sm-9">
<p class="form-control-static" id="Tnohp" name="Tnohp" ><?php echo "Rp ".number_format($detail->hrg_total,2,',','.'); ?></p>
</div>
</div>
<?php
$no=1;
foreach($detail_pesan as $i){
echo "<legend>Data Pemesanan Ke-$no</legend>";
?>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Tipe Produk </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i->nm_tipe." (".$i->id_produk.")"; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Nama Pengirim </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i->nm_pengirim; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Nama Penerima </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i->nm_penerima; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Jenis Acara </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i->nm_acara; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Kota Tujuan </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i->nm_kota; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Waktu Dibutuhkan </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i->tgl_kirim; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Alamat </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i->alamat; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Total Harga </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo "Rp ".number_format($i->hrg_tipe,2,',','.')." + Rp ".number_format($i->hrg_kota,2,',','.')." = Rp ".number_format($i->hrg_tipe+$i->hrg_kota,2,',','.') ?></p>
</div>
</div>
<br/>
<?php
$no++;
}
?>
<a href="<?php echo base_url(); ?>user/transaksi" class="btn btn-primary">Kembali ke Daftar Transaksi</a>
</form>
</section>
<br />
