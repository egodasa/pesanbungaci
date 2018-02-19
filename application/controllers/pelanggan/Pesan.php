<?php if (! defined('BASEPATH')) exit('No direct script access Hallowed');
class Beranda extends Shallom
{
 function __construct()
 {
	parent::__construct();
	$this->load->model('publik/Mberanda');
 }
 function beranda()
 {
	$data['judul']="Beranda";
	$data['daftar_produk']=$this->Mberanda->daftar_produk();
	$this->load->view('/template/2/head',$data);
	$this->load->view('/template/2/navbar',$data);
	$this->load->view('/template/2/sidebar',$data);
	$this->load->view('/publik/daftar',$data);
	$this->load->view('/template/2/footer');
 }
}
