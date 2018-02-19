<h1>Detail Produk</h1>
<section>
<form class="form-horizontal">
<div class="form-group">
<label class="control-label col-sm-2" for="Tusername">Tipe Produk : </label>
<div class="col-sm-10">
<p class="form-control-static" id="Ttipe" name="Ttipe"><?php echo $detail->nm_tipe; ?></p>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="Temail">Foto Produk : </label>
<div class="col-sm-10">
<p class="form-control-static" id="Tgambar" name="Tgambar" >
	<img src="<?php echo base_url().'produk/'.$detail->gambar; ?>" class="img img-thumbnail" />
</p>
</div>
</div>
<div class="col-sm-10">
<a href="<?php echo base_url().'user/produk/edit?id_produk='.$detail->id_produk; ?>" class="btn btn-success"><span class='glyphicon glyphicon-edit'></span> Edit Detail</a>
<a href="<?php echo base_url().'user/produk/hapus?id_produk='.$detail->id_produk; ?>" class="btn btn-danger"><span class='glyphicon glyphicon-trash'></span> Hapus Produk</a>
<a href="<?php echo base_url().'user/produk';?>" class="btn btn-primary"><span class='glyphicon glyphicon-list'></span> Daftar Produk</a>
</div>
</form>
</section>
<br />
