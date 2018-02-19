<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                      
      </button>
      <a href="<?php echo base_url();?>"><img src="<?php echo base_url().'/gambar/shallum.png';?>" class="navbar-brand" /></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
		  <?php if($this->session->id_jenis == 1){ ?>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Kelola Data
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a href="<?php echo base_url().'user/pengguna'; ?>">Data Pengguna</a></li>
			<li><a href="<?php echo base_url().'user/jenis-pengguna'; ?>">Data Jenis Pengguna</a></li>
			<li><a href="<?php echo base_url().'user/kota'; ?>">Data Kota</a></li>
			<li><a href="<?php echo base_url().'user/jenis-acara'; ?>">Data Jenis Acara</a></li>
			<li><a href="<?php echo base_url().'user/produk'; ?>">Data Produk</a></li>
			<li><a href="<?php echo base_url().'user/tipe-produk'; ?>">Data Tipe Produk</a></li>
			<li><a href="<?php echo base_url().'user/status-produk'; ?>">Data Status Produk</a></li>
			</ul>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Kelola Transaksi
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a href="<?php echo base_url().'user/transaksi'; ?>">Data Transaksi</a></li>
			<li><a href="<?php echo base_url().'user/status-transaksi'; ?>">Data Status Transaksi</a></li>
			<li><a href="<?php echo base_url().'user/status-pembayaran'; ?>">Data Status Pembayaran</a></li>
			</ul>
		</li>
		<!--<li><a href="<?php echo base_url().'user/pengaturan'; ?>">Pengaturan</a></li>-->
		<?php }
		else
		if($this->session->id_jenis == 2){ ?>
		<li><a href="<?php echo base_url().'cara-pemesanan'; ?>">Cara Pemesanan</a></li>
        <li><a href="<?php echo base_url().'tentang-kami'; ?>">Tentang Kami</a></li>
        <li><a href="<?php echo base_url().'hubungi-kami'; ?>">Hubungi Kami</a></li>
		<li><a href="<?php echo base_url().'user/transaksi'; ?>">Daftar Transaksi</a></li>
		<?php }
		else{ ?>
		<li><a href="<?php echo base_url().'tarif-pengiriman'; ?>">Tarif Pengiriman</a></li>
		<li><a href="<?php echo base_url().'cara-pemesanan'; ?>">Cara Pemesanan</a></li>
        <li><a href="<?php echo base_url().'tentang-kami'; ?>">Tentang Kami</a></li>
        <li><a href="<?php echo base_url().'hubungi-kami'; ?>">Hubungi Kami</a></li>
		<?php }
		if(empty($this->session->id_pengguna)){ ?>
			<li><a href='<?php echo base_url()."mendaftar"; ?>'><span class='glyphicon glyphicon-user'></span> Mendaftar</a></li>
			<li><a href='<?php echo base_url()."masuk"; ?>'><span class='glyphicon glyphicon-log-in'></span> Masuk</a></li>
		<?php } 
		else
		{ ?>
			<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class='glyphicon glyphicon-user'></span> <?php echo $this->session->username; ?>
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a href="<?php echo base_url().'user/profil'; ?>">Lihat Profil</a></li>
			<li><a href="<?php echo base_url().'user/ganti-profil'; ?>">Ganti Profil</a></li>
			<li><a href="<?php echo base_url().'user/ganti-password'; ?>">Ganti Password</a></li>
			</ul>
			</li>
			<li><a href='<?php echo base_url()."logout"; ?>'><span class='glyphicon glyphicon-log-out'></span> Keluar</a></li>";
		<?php } ?>
     </ul>
    </div>
</nav>
  
		
		
		
    
