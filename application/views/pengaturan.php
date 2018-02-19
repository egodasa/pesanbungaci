<section>
<fieldset>
<h1>Pengaturan Sistem</h1>
<?php
echo $this->session->flashdata('pesan');
$ulogo = array('class'=>'form-control');
$warna = array('type'=>'color');
echo form_open_multipart('user/pengaturan','pengaturan');
?>
<div class='form-group '>
	<label for="Tnavbar" class="label-control">Warna Navigasi Bar (Menu Atas) </label>
	<input id="Tnavbar" class="form-control" name="Tnavbar" value="<?php echo $navbar; ?>" type="color" />
</div>

<div class='form-group '>
	<label for="Tfooter" class="label-control">Tulisan Footer </label>
	<input id="Tfooter" class="form-control" name="Tfooter" value="<?php echo $footer; ?>" type="input" />
</div>
<?php
echo "<div class='form-group ".$this->session->flashdata('ulogo')."'><label for='ulogo' class='label-control'>Logo Website :</label>".form_upload('ulogo',set_value('ulogo'),$ulogo);
echo '<span class="help-block">'.$this->session->flashdata('ulogo_err').'</span>';
echo "</div>";
?>
<button type="submit" class="btn btn-success">Simpan</button>
<a href="<?php echo base_url(); ?>" class="btn btn-primary">Batal</a>
</form>
</fieldset>
</section>
