<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Pengaturan extends Shallom
{
 function __construct()
 {
	parent::__construct();
	$this->load->library('akses');
	$this->akses->cek_akses('Admin');
	$this->load->database();
}
 /*function pengaturan(){
	if($this->form_validation->run('admin_simpan_pengaturan')){
		$this->Mpengaturan->simpan_pengaturan();
		$this->session->set_flashdata('pesan',$this->pesan('success','Pengaturan Berhasil disimpan.'));
		redirect('user/pengaturan');
	}
	else{
	if(empty(form_error('Tfooter'))){
		$this->konsol('form validasi Tfooter kosong');
		$this->session->set_flashdata('Tfooter','');
	}
	else{
		$this->konsol('form validasi error');
		$this->session->set_flashdata('Tfooter','has-error');
	}
	
	if(empty(form_error('ulogo'))){
		$this->konsol('form validasi ulogo kosong');
		$this->session->set_flashdata('ulogo','');
	}
	else{
		$this->konsol('form validasi ulogo error');
		$this->session->set_flashdata('ulogo','has-error');
		$this->session->set_flashdata('ulogo_err',$this->upload->display_errors());
	}
	}
	$data['judul'] = 'Pengaturan Sistem';
	$this->load->view('/template/2/head',$data);
	$this->load->view('/template/2/style',$this->pengaturan);
	$this->load->view('/template/2/navbar',$data);
	$this->load->view('/template/2/sidebar',$data);
	$this->load->view('pengaturan',$data);
	$this->load->view('/template/2/footer',$this->pengaturan);
 }
 function validasi_upload(){
	$config['upload_path']          = './gambar';
	$config['allowed_types']        = 'jpg|png|gif|bmp';
	$config['max_size']             = 2048;
	$config['max_width']            = 1000;
	$config['max_height']           = 500;
	$config['min_width']            = 100;
	$config['min_height']           = 25;
	$this->load->library('upload', $config);
	RETURN $this->upload->do_upload('ulogo');
 }
*/
}
