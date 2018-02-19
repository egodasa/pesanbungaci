    <br />
    <?php 
    echo $this->session->flashdata('pesan');
    if(empty($this->session->id_pengguna)){
    ?>
			<div class="alert alert-info alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Pesan Penting!</strong><br/>Silahkan <a href="<?php echo base_url(); ?>masuk"><b>Masuk/Login</b></a> terlebih dahulu untuk melakukan pemesanan karangan bunga.</div>
			<?php } ?>
			<div class="well well-sm">
			<?php
			$acak = array('class'=>'form-inline');
			echo form_open('pesan-acak',$acak);
			?>
			<div class='form-group '>
				<label for="Tjumlah" class="label-control">Butuh berapa banyak karangan bunga ? </label>
				<input id="Tjumlah" placeholder="Min. 1" class="form-control" type="number" min=1 name="Tjumlah" value=""  />
			</div>
			<button type="submit" class="btn btn-success">Pesan</button>
			<?php
			echo form_close();
			?>	
			</div>
	 </form>
    </div>
    <div class="container">  
		<div class="row">
    <?php
    if(is_array($laporan)){
		$no=1;
	    foreach($laporan as $lap){
		echo "
		<div class='item  col-xs-12 col-lg-4'>
            <div class='thumbnail'>
                <img class='group list-group-image responsive' src='".base_url()."produk/".$lap->gambar."' alt='' width='400' height='250' />
                <div class='caption'>
                    <h4 class='group inner list-group-item-heading'>Tipe : ".$lap->nm_tipe."</h4>
                    <h4 class='group inner list-group-item-heading'>Ukuran : ".$lap->ukuran."</h4>
                    <div class='row'>
                        <div class='col-xs-12 col-md-6'>
                            <p class='lead'>
                                Rp".number_format($lap->hrg_tipe,2,',','.')."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		";
	    $no++;
		}
	}
	else echo "<center>$laporan</center>";
	?>
