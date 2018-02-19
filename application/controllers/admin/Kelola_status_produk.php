<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Kelola_status_produk extends Shallom
{
	public $id_status;
 function __construct()
 {
	parent::__construct();
	$this->load->library('akses');
	$this->akses->cek_akses('Admin');
	$this->load->database();
	$this->load->model('admin/MKelola_status_produk');
	//$this->cek_login('Admin');
	$this->id_status = $this->input->get('id_status');
}
 function laporan_status_produk()
 {
	    $this->tambah_status_produk();
		$data['laporan']=$this->MKelola_status_produk->laporan_status_produk();
		$data['judul']='Kelola Status Produk';
		$this->load->view('/template/2/head',$data); 
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('admin/laporan-status-produk',$data);
		$this->load->view('/template/2/footer');
 }
 function tambah_status_produk(){
	 if($this->form_validation->run('admin_data_status_produk') === TRUE)
		{
			$this->MKelola_status_produk->tambah_status_produk();
			$this->session->set_flashdata('pesan',$this->pesan('success','Data status produk baru berhasil ditambahkan.'));
			set_value('Tnm_status_produk','');
		}
		else
		{
			if(empty(form_error('Tnm_status_produk'))) $this->session->set_flashdata('Tnm_status_produk','');
			else $this->session->set_flashdata('Tnm_status_produk','has-error');
			
			if(empty(form_error('Thrg_status_produk'))) $this->session->set_flashdata('Thrg_status_produk','');
			else $this->session->set_flashdata('Thrg_status_produk','has-error');
		}
 }
 function edit_status_produk(){
	 if($this->MKelola_status_produk->ambil_status_produk($this->id_status)){
		 $data['detail'] = $this->MKelola_status_produk->ambil_status_produk($this->id_status);
		 $data['judul'] = 'Edit Status Produk';
		 $this->load->view('/template/2/head',$data); 
		 $this->load->view('/template/2/style');
		 $this->load->view('/template/2/navbar',$data);
		 $this->load->view('/template/2/sidebar',$data);
		 if($this->form_validation->run('admin_data_status_produk') === TRUE)
			{
				if($this->MKelola_status_produk->edit_status_produk($this->id_status) === TRUE) 
				{
					$this->session->set_flashdata('pesan',$this->pesan('success','Data status produk berhasil diubah.'));
					redirect('user/status-produk');
				}
				else echo "<script>console.log('registrasi berhasil');</script>";
			}
			else
			{
				echo "<script>console.log('registrasi gagal');</script>";
				if(empty(form_error('Tnm_status_produk'))) $this->session->set_flashdata('Tnm_status_produk','');
				else $this->session->set_flashdata('Tnm_status_produk','has-error');
	 }
	 	 $this->load->view('admin/edit-status-produk',$data);
		 $this->load->view('/template/2/footer');
	 }
	 else{
		$this->session->set_flashdata('pesan',$this->pesan('danger','Data status produk yang Anda minta tidak ditemukan....'));
		redirect('user/status-produk');
	 }
 }
  function hapus_status_produk(){
	 if($this->MKelola_status_produk->hapus_status_produk($this->id_status)){
		$this->session->set_flashdata('pesan',$this->pesan('success','Data status produk berhasil dihapus.'));
		redirect('user/status-produk');
	}
	else{
		$this->session->set_flashdata('pesan',$this->pesan('danger','Data status produk yang Anda minta tidak ditemukan....'));
		redirect('user/status-produk');
	 }
	}
}
