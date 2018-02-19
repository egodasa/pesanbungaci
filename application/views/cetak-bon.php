<div class="col-xs-*">
						<div class="col-xs-6">
						<div class="col-xs-12 text-center">
							<img src="<?php echo base_url().'/gambar/shallum.png';?>" width=300 height=50 />
						</div>
						<div class="col-xs-12 text-center">
							<b>Jl. Raya Lubuk Begalung 01/02 No. 2 Padang<br/>Hp. 082284758480 Telp. 0751 - 71579</b>
						</div>
						</div>
	<div class="col-xs-6">
		<div class="form-group">
		<label class="control-label col-xs-4" for="Tusername">ID Transaksi  </label>
		<div class="col-xs-8">
		<p class="form-control-static" id="Tusername" name="Tusername" ><?php echo $detail->id_transaksi; ?></p>
		</div>
		</div>
		<div class="form-group">
		<label class="control-label col-xs-4" for="Tusername">Padang  </label>
		<div class="col-xs-8">
		<p class="form-control-static" id="Tusername" name="Tusername" ><?php echo $tanggal; ?></p>
		</div>
		</div>
		<div class="form-group">
		<label class="control-label col-xs-4" for="Tusername">Kepada Yth </label>
		<div class="col-xs-8">
		<p class="form-control-static" id="Tusername" name="Tusername" ><?php echo $detail->nm_pengguna; ?></p>
		</div>
		</div>
	</div>
	<table class="table table-bordered table-condensed">
		<tr class="info">
			<td>No</td>
			<td>Nama Barang </td>
			<td>Harga Satuan</td>
			<td>Tarif Pengiriman</td>
			<td>Harga Total</td>
		</tr>
		<?php
		$no=1;
		foreach($detail_pesan as $i){
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td>Karangan Bunga Jenis <?php echo $i->nm_tipe." (".$i->id_produk.")"; ?></td>
			<td><?php echo "Rp".number_format($i->hrg_tipe,2,',','.'); ?></td>
			<td><?php echo "Rp".number_format($i->hrg_kota,2,',','.'); ?></td>
			<td><?php echo "Rp".number_format($i->hrg_tipe+$i->hrg_kota,2,',','.'); ?></td>
		</tr>
		<tr></tr>
		<?php
		$no++;
		}
		?>
		<tr><td colspan=4 class="text-right">Total Biaya</td><td><?php echo "Rp ".number_format($detail->hrg_total,2,',','.'); ?></td></tr>
		</table>
</div>
</body>
</html>
