<br/>
<fieldset>
<legend><h2>Profil Anda</h2></legend>
<section>
<?php echo $this->session->flashdata('pesan'); ?>
<form class="form-horizontal">
<div class="form-group">
<label class="control-label col-sm-2" for="Tusername">Username </label>
<div class="col-sm-10">
<p class="form-control-static" id="Tusername" name="Tusername" ><?php echo $username; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Tusername">Nama Pengguna </label>
<div class="col-sm-10">
<p class="form-control-static" id="Tusername" name="Tusername" ><?php echo $nm_pengguna; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Temail">Email </label>
<div class="col-sm-10">
<p class="form-control-static" id="Temail" name="Temail" ><?php echo $email; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Tnohp">Nomor Handphone </label>
<div class="col-sm-10">
<p class="form-control-static" id="Tnohp" name="Tnohp" ><?php echo $nohp; ?></p>
</div>
</div>
<a href="<?php echo base_url(); ?>user/ganti-profil" class="btn btn-primary">Ganti Profil</a>
<a href="<?php echo base_url(); ?>user/ganti-password" class="btn btn-warning">Ganti Password</a>
</form>
</section>
</fieldset>
