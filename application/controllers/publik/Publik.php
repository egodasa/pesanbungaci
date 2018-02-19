<?php if (! defined('BASEPATH')) exit('No direct script access Hallowed');
class Publik extends Shallom
{
function __construct()
{
parent::__construct();
$this->load->database();
$this->load->model('admin/MKelola_kota');
}
function tentang_kami(){
$this->template('/publik/tentang-kami','Tentang Shallom Flower',2); 
}
function hubungi_kami(){
$this->template('/publik/hubungi-kami','Hubungi Shallom Flower',2); 
}
function cara_pemesanan(){
$this->template('/publik/cara-pemesanan','Cara Pemesanan',2); 
}
function keluar(){
$this->akses->logout();
}
function tarif_pengiriman(){
	$data['laporan']=$this->MKelola_kota->laporan_kota($this->input->get('urutkan'));
	$data['judul']='Tarif Pengiriman';
	$this->load->view('/template/2/head',$data);
	$this->load->view('/template/2/style');
	$this->load->view('/template/2/navbar',$data);
	$this->load->view('/template/2/sidebar',$data);
	$this->load->view('publik/tarif-pengiriman',$data);
	$this->load->view('/template/2/footer');
}
}
