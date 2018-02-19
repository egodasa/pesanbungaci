<?php
$sisa_standar = $tersedia['standar'] - $dipesan['standar'];
$sisa_jumbo = $tersedia['jumbo'] - $dipesan['jumbo'];
$sisa_double = $tersedia['double'] - $dipesan['double'];
$izin_pesan="";
if($sisa_standar < 0){
	$pesan_standar = "<br/>Pesanan tidak dapat diproses karena kekurangan stok Jenis Standar sebanyak ".-1*$sisa_standar." Buah";
	$izin_pesan="disabled";
	}
else $pesan_standar=null;
if($sisa_jumbo < 0){
	$pesan_jumbo = "<br/>Pesanan tidak dapat diproses karena kekurangan stok Jenis Jumbo sebanyak ".-1*$sisa_jumbo." Buah";
	$izin_pesan="disabled";
	}
else $pesan_jumbo=null;
if($sisa_double < 0){
	$pesan_double = "<br/>Pesanan tidak dapat diproses karena kekurangan stok Jenis Double sebanyak ".-1*$sisa_double." Buah";
	$izin_pesan="disabled";
	}
else $pesan_double=null;
?>

<h1>Detail Pesanan</h1>
<div class="alert alert-info">Silahkan cek data pemesanan Anda terlebih dahulu</div>
<?php 
if($pesan_standar || $pesan_jumbo || $pesan_double){
	echo "<div class='alert alert-danger'><strong>Peringatan!</strong><br/>".$pesan_standar.$pesan_jumbo.$pesan_double."</div>";
}
 ?>
<section>
<legend>Banyak Pesanan </legend>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Ukuran Standar</label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $dipesan['standar']." Buah"; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Ukuran Jumbo</label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $dipesan['jumbo']." Buah"; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Ukuran Double</label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $dipesan['double']." Buah"; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Total Pesanan</label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $dipesan['double']+$dipesan['standar']+$dipesan['jumbo']." Buah"; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Total yang harus dibayarkan </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo "Rp ".number_format($data_transaksi['hrg_total'],2,',','.'); ?></p>
</div>
</div>
<?php
$no=1;
foreach($detail as $i){
echo "<legend>Data Pemesanan Ke-$no</legend>";
?>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Tipe Produk </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i['nm_tipe']; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Nama Pengirim </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i['nm_pengirim']; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Nama penerima </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i['nm_penerima']; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Jenis Acara </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i['nm_acara']; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Kota Tujuan </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i['nm_kota']; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Waktu Dibutuhkan </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i['tgl_butuh']." Jam ".$i['jam_butuh']; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Alamat </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $i['alamat']; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Ttipe">Total Harga </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo "Rp ".number_format($i['hrg_tipe'],2,',','.')." + Rp ".number_format($i['hrg_kota'],2,',','.')." = Rp ".number_format($i['hrg_tipe']+$i['hrg_kota'],2,',','.') ?></p>
</div>
</div>
<br/>
<?php
$no++;
}
?>
<a href="<?php echo base_url();?>pesan/proses" class='btn btn-success <?php echo $izin_pesan; ?>'>Proses</a>
<a href='<?php echo base_url(); ?>' class='btn btn-primary'>Kembali</a>
</form>
</section>
<br />
