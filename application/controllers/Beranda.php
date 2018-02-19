<?php if (! defined('BASEPATH')) exit('No direct script access Hallowed');
class Beranda extends Shallom
{
 function __construct()
 {
	parent::__construct();
	$this->load->model('publik/Mberanda');
	$this->load->model('admin/MKelola_tipe_produk');
	$this->load->library('pengaturan');
 }
 public function beranda()
 {
	$data['judul']="Beranda";
	$data['stok']=$this->Mberanda->hitung_stok();	
	$data['tipe']=$this->MKelola_tipe_produk->tipe_produk();
	$data['laporan']=$this->Mberanda->daftar_produk();
	$this->load->view('/template/2/head',$data);
	$this->load->view('/template/2/style');
	$this->load->view('/template/2/navbar',$data);
	$this->load->view('/template/2/sidebar',$data);
	$this->load->view('/publik/beranda',$data);
	$this->load->view('/template/2/footer');
 }
 function pesan_acak($banyak){
	if(empty($this->input->post('Tjumlah'))) $banyak =1;
	else $banyak=$this->input->post('Tjumlah');
 $this->session->set_flashdata('jumlah',$banyak);
 redirect('pesan/'.$banyak);
 }
}
