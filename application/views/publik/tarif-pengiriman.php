<br/>
<fieldset>
<legend><h2>Tarif Pengiriman</h2></legend>
<table class='table table-striped table-bordered'>
<tr>
<td>No</td>
<td>Nama Kota</td>
<td>Tarif</td>
</tr>
<?php
	$no=1;
	if(is_array($laporan)){
	foreach($laporan as $lap){?>
				<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $lap->nm_kota; ?></td>
				<td>Rp <?php echo number_format($lap->hrg_kota,2,",","."); ?></td></tr>
				<?php
				$no++;
			}
		}
		else echo "<tr><td colspan=4>$laporan</td></tr>";
?>
</table>
</fieldset> 	
