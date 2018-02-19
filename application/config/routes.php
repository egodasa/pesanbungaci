<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Beranda/beranda';
$route['mendaftar'] = 'publik/Mendaftar/mendaftar';
$route['(cara-pemesanan|hubungi-kami|tentang-kami|tarif-pengiriman)'] = 'publik/Publik/$1';
$route['masuk'] = 'publik/Masuk/masuk';
$route['user/pengguna'] = 'admin/Kelola_pengguna/laporan-pengguna';
$route['user/pengguna/tambah'] = 'admin/Kelola_pengguna/tambah-pengguna';
$route['user/pengguna/edit'] = 'admin/Kelola_pengguna/edit-pengguna/';
$route['user/pengguna/hapus'] = 'admin/Kelola_pengguna/hapus-pengguna';
$route['user/jenis-acara'] = 'admin/Kelola_jenis_acara/laporan-jenis-acara';
$route['user/jenis-acara/tambah'] = 'admin/Kelola_jenis_acara/tambah-jenis-acara';
$route['user/jenis-acara/edit'] = 'admin/Kelola_jenis_acara/edit-jenis-acara';
$route['user/jenis-acara/hapus'] = 'admin/Kelola_jenis_acara/hapus-jenis-acara';
$route['user/jenis-pengguna'] = 'admin/Kelola_jenis_pengguna/laporan-jenis-pengguna';
$route['user/jenis-pengguna/tambah'] = 'admin/Kelola_jenis_pengguna/tambah-jenis-pengguna';
$route['user/jenis-pengguna/edit'] = 'admin/Kelola_jenis_pengguna/edit-jenis-pengguna';
$route['user/jenis-pengguna/hapus'] = 'admin/Kelola_jenis_pengguna/hapus-jenis-pengguna';
$route['user/kota'] = 'admin/Kelola_kota/laporan-kota';
$route['user/kota/tambah'] = 'admin/Kelola_kota/tambah-kota';
$route['user/kota/edit'] = 'admin/Kelola_kota/edit-kota';
$route['user/kota/hapus'] = 'admin/Kelola_kota/hapus-kota';
$route['user/tipe-produk'] = 'admin/Kelola_tipe_produk/laporan_tipe_produk';
$route['user/tipe-produk/tambah'] = 'admin/Kelola_tipe_produk/tambah_tipe-produk';
$route['user/tipe-produk/edit'] = 'admin/Kelola_tipe_produk/edit_tipe_produk';
$route['user/tipe-produk/hapus'] = 'admin/Kelola_tipe_produk/hapus_tipe_produk';
$route['user/produk'] = 'admin/Kelola_produk/laporan_produk';
$route['user/produk/detail'] = 'admin/Kelola_produk/detail_produk';
$route['user/produk/tambah'] = 'admin/Kelola_produk/tambah_produk';
$route['user/produk/edit'] = 'admin/Kelola_produk/edit_produk';
$route['user/produk/hapus'] = 'admin/Kelola_produk/hapus_produk';
$route['user/produk/aktif'] = 'admin/Kelola_produk/status_produk/aktif';
$route['user/produk/nonaktif'] = 'admin/Kelola_produk/status_produk/nonaktif'; 
$route['user/profil'] = 'Profil/profil';
$route['user/ganti-profil'] = 'Profil/ganti-profil';
$route['user/ganti-password'] = 'Profil/ganti-password';
$route['logout'] = 'publik/Publik/keluar';
$route['user/pengaturan'] = 'Pengaturan/pengaturan';
$route['petunjuk'] = 'bootstrap/beranda';
$route['pesan/(:num)'] = 'Pesan/pesan_produk/$1';
$route['pesan/detail'] = 'Pesan/detail_pesan';
$route['pesan-acak'] = 'Beranda/pesan_acak';
$route['pesan/proses'] = 'Pesan/proses_pesan';
$route['user/transaksi'] = 'Transaksi/laporan_transaksi';
$route['user/transaksi/detail'] = 'Transaksi/detail_transaksi';
$route['user/transaksi/konfirmasi'] = 'Transaksi/konfirmasi_transaksi';
$route['user/transaksi/validasi'] = 'Transaksi/pembayaran';
$route['user/transaksi/cetak-bukti'] = 'Transaksi/cetak_bon';
$route['user/transaksi/validasi/(:num)'] = 'Transaksi/validasi_pembayaran/$1';
$route['user/transaksi/batal'] = 'Transaksi/batal_transaksi';
$route['user/status-transaksi'] = 'admin/Kelola_status_transaksi/laporan_status_transaksi';
$route['user/status-transaksi/edit'] = 'admin/Kelola_status_transaksi/edit_status_transaksi';
$route['user/status-transaksi/hapus'] = 'admin/Kelola_status_transaksi/hapus_status_transaksi';
$route['user/status-pembayaran'] = 'admin/Kelola_status_pembayaran/laporan_status_pembayaran';
$route['user/status-pembayaran/edit'] = 'admin/Kelola_status_pembayaran/edit_status_pembayaran';
$route['user/status-pembayaran/hapus'] = 'admin/Kelola_status_pembayaran/hapus_status_pembayaran';
$route['user/status-produk'] = 'admin/Kelola_status_produk/laporan_status_produk';
$route['user/status-produk/edit'] = 'admin/Kelola_status_produk/edit_status_produk';
$route['user/status-produk/hapus'] = 'admin/Kelola_status_produk/hapus_status_produk';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

