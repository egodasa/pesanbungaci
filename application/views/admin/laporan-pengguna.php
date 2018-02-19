<br/>
<fieldset>
<legend><h2>Data Pengguna</h2></legend>
<?php echo $this->session->flashdata('pesan'); ?>

<div class="form-group">
  	<a class='btn btn-success' href='<?php echo base_url()."user/pengguna/tambah"; ?>'><span class='glyphicon glyphicon-plus-sign'></span> Tambah Pengguna</a>
<div class="btn-group">
  <button type="button" class="btn btn-default">Tampilkan Data Berdasarkan </button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="?urutkan=username_asc">Username A - Z</a></li>
    <li><a href="?urutkan=username_desc">Username Z - A</a></li>
    <li><a href="?urutkan=nama_asc">Nama Pengguna A - Z</a></li>
    <li><a href="?urutkan=nama_desc">Nama Pengguna Z - A</a></li>
  </ul>
</div>
</div>
<form class="form-inline" method="GET" action="<?php echo base_url(); ?>user/pengguna?cari=<?php echo $this->input->get('cari'); ?>">
  <div class="form-group">
    <label for="cari">Pencarian Data Pengguna : </label>
    <input type="text" class="form-control" name="cari">
    <select class="form-control" name="filter">
		<option value="username">- Cari Berdasarkan -</option>
		<option value="username">Username</option>
		<option value="nm_pengguna">Nama Pengguna</option>
		<option value="email">Email</option>
		<option value="nohp">Nohp</option>
		</select>
		<div class="btn-group">
    <button type="submit" class="btn btn-primary">Cari</button>
    <a href="<?php echo base_url(); ?>user/pengguna" class="btn btn-success">Reset</a>
    </div>
  </div>
</form>
<table class='table table-striped table-bordered'>
<tr>
<td>No</td>
<td>Username</td>
<td>Nama Pengguna</td>
<td>Email</td>
<td>NoHP</td>
<td>Jenis</td>
<td colspan=2>Aksi</td>
</tr>
<?php
	$no=1;
	if(is_array($laporan)){
	foreach($laporan as $lap){?>
				<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $lap->username; ?></td>
				<td><?php echo $lap->nm_pengguna; ?></td>
				<td><?php echo $lap->email; ?></td>
				<td><?php echo $lap->nohp; ?></td>
				<td><?php echo $lap->nm_jenis; ?></td>
				<td>
					<div class="btn-group.btn-group-justified">
						<a href="<?php echo base_url();?>user/pengguna/edit?id_pengguna=<?php echo $lap->id_pengguna; ?>" class="btn btn-success">
						<span class="glyphicon glyphicon-edit"></span> Edit</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#konfirmasi<?php echo $lap->id_pengguna; ?>">
				<span class="glyphicon glyphicon-remove"></span> Hapus
				</button>
				<div id="konfirmasi<?php echo $lap->id_pengguna; ?>" class="modal fade" role="dialog"><div class="modal-dialog"><div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Peringatan!</h4>
				</div>
				<div class="modal-body">
				<p>Apakah Anda yakin ingin menghapus pengguna dengan username <b>"<?php echo $lap->username; ?>"</b> dari sistem?</p>
				</div>
				<div class="modal-footer float-right">
				<a href="<?php echo base_url(); ?>user/pengguna/hapus?id_pengguna=<?php echo $lap->id_pengguna; ?>" class="btn btn-danger">    Ya    </a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
				</div></div></div></div></div></td></tr>
				<?php
				$no++;
				}
			}
			else echo "<tr><td colspan=6>$laporan</td></tr>";
?>
</table>
</fieldset>
