<br/>
<fieldset>
<legend><h2>Daftar Transaksi</h2></legend>
<div class="alert alert-info alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Info!</strong><br/>Cetak Bon/Cetak Bukti dapat dilakukan setelah <u><b>status transaksi Anda Aktif.</b></u>
</div>
<?php echo $this->session->flashdata('pesan'); ?>
<div class="btn-group">
  <button type="button" class="btn btn-default">Tampilkan Data Berdasarkan </button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="?urutkan=tgl_pesan_asc">Tanggal Pesan</a></li>
    <li><a href="?urutkan=status_transaksi_aktif">Status Transaksi (Aktif)</a></li>
    <li><a href="?urutkan=status_transaksi_nonaktif">Status Transaksi (Belum Aktif)</a></li>
    <li><a href="?urutkan=status_transaksi_batal">Status Transaksi (Batal)</a></li>
    <li><a href="?urutkan=status_bayar_belum_bayar">Status Pembayaran (Belum Dibayar)</a></li>
    <li><a href="?urutkan=status_bayar_diproses">Status Pembayaran (Diproses)</a></li>
    <li><a href="?urutkan=status_bayar_diterima">Status Pembayaran (Diterima)</a></li>
    <li><a href="?urutkan=status_bayar_ditolak">Status Pembayaran (Ditolak)</a></li>
  </ul>
</div>
<?php
	$hitung = count($transaksi);
	for($i = 0;$i<$hitung;$i++){
	echo $transaksi[$i];
	}
?>
</fieldset>
