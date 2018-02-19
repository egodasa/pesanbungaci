<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Kelola_produk extends Shallom
{
	public $id_produk;
 function __construct()
 {
	parent::__construct();
	$this->load->library('akses');
	$this->akses->cek_akses('Admin');
	$this->load->database();
	$this->load->model('admin/MKelola_produk');
	$this->load->model('admin/MKelola_tipe_produk');
	//$this->cek_login('Admin');
	$this->id_produk = $this->input->get('id_produk');
}
 function laporan_produk()
 {
		$this->tambah_produk();
		$data['laporan']=$this->MKelola_produk->laporan_produk();
		$data['tipe']=$this->data_combobox($this->db->get('tbtipe_produk')->result(),'id_tipe','nm_tipe','-- Tipe Produk --');
		$data['judul']='Kelola produk';
		$this->load->view('/template/2/head',$data); 
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('admin/laporan-produk',$data);
		$this->load->view('/template/2/footer');
 }
 function tambah_produk(){
	 if($this->form_validation->run('admin_tambah_produk')){
			$this->konsol('form validasi true');
			$this->session->set_flashdata('pesan',$this->pesan('success','Data Produk baru berhasil ditambahkan.'));
			$this->MKelola_produk->tambah_produk();
			redirect('user/produk');
	}
	else{
	$this->konsol('form validasi false');
	if(empty(form_error('Ctipe'))) {
		$this->konsol('form validasi ctipe kosong');
		$this->session->set_flashdata('Ctipe','');
	}
	else{
		$this->konsol('form validasi ctipe error');
		$this->session->set_flashdata('Ctipe','has-error');
	}
	
	if(empty(form_error('Ugambar'))){
		$this->konsol('form validasi ugambar kosong');
		$this->session->set_flashdata('Ugambar','');
	}
	else{
	$this->konsol('form validasi ugambar error');
	$this->session->set_flashdata('Ugambar','has-error');
	$this->session->set_flashdata('Ugambar_err',$this->upload->display_errors());
	}
	}
 }
 function status_produk($status){
	switch($status){
	case 'aktif' : {
	if($this->db->set('id_status_produk',1)->where('id_produk',$this->input->get('id_produk'))->update('tbproduk')){
	$this->session->set_flashdata('pesan',$this->pesan('success','Produk berhasil diaktifkan.'));
	redirect('user/produk');
	}
	else{
	$this->session->set_flashdata('pesan',$this->pesan('danger','Produk gagal diaktifkan.'));
	redirect('user/produk');
	}
	break;
	}
	case 'nonaktif' : {
	if($this->db->set('id_status_produk',2)->where('id_produk',$this->input->get('id_produk'))->update('tbproduk')){
	$this->session->set_flashdata('pesan',$this->pesan('success','Produk berhasil dinon-aktifkan.'));
	redirect('user/produk');
	}
	else{
	$this->session->set_flashdata('pesan',$this->pesan('danger','Produk gagal dinon-aktifkan.'));
	redirect('user/produk');
	}
	break;
	}
	default : {
	$this->session->set_flashdata('pesan',$this->pesan('warning','Halaman yang anda minta tidak ditemukan.'));
	redirect('user/produk');
	}
	}
 }
 function detail_produk(){
	$data['detail'] = $this->MKelola_produk->detail_produk($this->id_produk);
	if($data['detail']){
	$data['judul'] = 'Detail Produk';
	$this->load->view('/template/2/head',$data); 
	$this->load->view('/template/2/style');
	$this->load->view('/template/2/navbar',$data);
	$this->load->view('/template/2/sidebar',$data);
	$this->load->view('admin/detail-produk',$data);
	$this->load->view('/template/2/footer');
	}
	else{
	$this->session->set_flashdata('pesan',$this->pesan('danger','Data Produk tidak ditemukan...'));
	redirect('user/produk');
	}
 }
 function edit_produk()
 {
	if($this->MKelola_produk->detail_produk($this->id_produk)){
		$data['detail'] = $this->MKelola_produk->detail_produk($this->id_produk);
		$data['tipe']=$this->data_combobox($this->db->get('tbtipe_produk')->result(),'id_tipe','nm_tipe','-- Tipe Produk --');
		if($this->form_validation->run('admin_tambah_produk')){
				$this->konsol('form validasi true');
				$this->session->set_flashdata('pesan',$this->pesan('success','Data Produk berhasil diubah.'));
				$this->MKelola_produk->edit_produk($id_produk);
				redirect('user/produk');
		}
		else{
		$this->konsol('form validasi false');
		if(empty(form_error('Ctipe'))) {
			$this->konsol('form validasi ctipe kosong');
			$this->session->set_flashdata('Ctipe','');
		}
		else{
			$this->konsol('form validasi ctipe error');
			$this->session->set_flashdata('Ctipe','has-error');
		}
		
		if(empty(form_error('Ugambar'))){
			$this->konsol('form validasi ugambar kosong');
			$this->session->set_flashdata('Ugambar','');
		}
		else{
		$this->konsol('form validasi ugambar error');
		$this->session->set_flashdata('Ugambar','has-error');
		$this->session->set_flashdata('Ugambar_err',$this->upload->display_errors());
		}
		
		}
		$data['judul'] = 'Edit Detail Produk';
		$this->load->view('/template/2/head',$data); 
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('admin/edit-produk',$data);
		$this->load->view('/template/2/footer');
	}
	else{
		$this->session->set_flashdata('pesan',$this->pesan('danger','Data Produk yang Anda minta tidak ditemukan...'));	 
		redirect('user/produk');
	}
 }
 function hapus_produk(){
	 if($this->MKelola_produk->hapus_produk($this->id_produk)){
		$this->session->set_flashdata('pesan',$this->pesan('success','Data Produk berhasil diubah.'));	 
		redirect('user/produk');
	}
	else{
		$this->session->set_flashdata('pesan',$this->pesan('danger','Data Produk yang Anda minta tidak ditemukan...'));	 
		redirect('user/produk');
	}
} 
 function validasi_upload(){
	$config['upload_path']          = './produk';
	$config['allowed_types']        = 'jpg';
	$config['max_size']             = 3048;
	$config['max_width']            = 3000;
	$config['max_height']           = 3000;
	$config['min_width']            = 420;
	$config['min_height']           = 200;
	$this->load->library('upload', $config);
	RETURN $this->upload->do_upload('Ugambar');
 }
 function validasi_tipe(){
	if($this->input->post('Ctipe') == '0')
	{
		$this->form_validation->set_message('validasi_tipe','Silahkan pilih tipe produk!');
		return false;
	}
	else return true;
 }
}
