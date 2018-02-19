<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Kelola_status_pembayaran extends Shallom
{
	public $id_status;
 function __construct()
 {
	parent::__construct();
	$this->load->library('akses');
	$this->akses->cek_akses('Admin');
	$this->load->database();
	$this->load->model('admin/MKelola_status_pembayaran');
	//$this->cek_login('Admin');
	$this->id_status = $this->input->get('id_status');
}
 function laporan_status_pembayaran()
 {
	    $this->tambah_status_pembayaran();
		$data['laporan']=$this->MKelola_status_pembayaran->laporan_status_pembayaran();
		$data['judul']='Kelola Daftar Status pembayaran';
		$this->load->view('/template/2/head',$data); 
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('admin/laporan-status-pembayaran',$data);
		$this->load->view('/template/2/footer');
 }
 function tambah_status_pembayaran(){
	 if($this->form_validation->run('admin_data_status_pembayaran') === TRUE)
		{
			$this->MKelola_status_pembayaran->tambah_status_pembayaran();
			$this->session->set_flashdata('pesan',$this->pesan('success','Data status pembayaran baru berhasil ditambahkan.'));
		}
		else
		{
			if(empty(form_error('Tnm_status_pembayaran'))) $this->session->set_flashdata('Tnm_status_pembayaran','');
			else $this->session->set_flashdata('Tnm_status_pembayaran','has-error');
		}
 }
 function edit_status_pembayaran(){
	 if($this->MKelola_status_pembayaran->ambil_status_pembayaran($this->id_status)){
		 $data['detail'] = $this->MKelola_status_pembayaran->ambil_status_pembayaran($this->id_status);
		 $data['judul'] = 'Edit Status pembayaran';
		 $this->load->view('/template/2/head',$data); 
	     $this->load->view('/template/2/style');
		 $this->load->view('/template/2/navbar',$data);
		 $this->load->view('/template/2/sidebar',$data);
		 if($this->form_validation->run('admin_data_status_pembayaran') === TRUE)
			{
				if($this->MKelola_status_pembayaran->edit_status_pembayaran($this->id_status) === TRUE) 
				{
					$this->session->set_flashdata('pesan',$this->pesan('success','Data status pembayaran berhasil diubah.'));
					redirect('user/status-pembayaran');
				}
				else echo "<script>console.log('registrasi berhasil');</script>";
			}
			else
			{
				echo "<script>console.log('registrasi gagal');</script>";
				if(empty(form_error('Tnm_status_pembayaran'))) $this->session->set_flashdata('Tnm_status_pembayaran','');
				else $this->session->set_flashdata('Tnm_status_pembayaran','has-error');
	 }
	 	 $this->load->view('admin/edit-status-pembayaran',$data);
		 $this->load->view('/template/2/footer');
		 }
		 else {
			$this->session->set_flashdata('pesan',$this->pesan('danger','Data status pembayaran yang Anda minta tidak ditemukan...'));
			redirect('user/status-pembayaran');
		 }
 }
  function hapus_status_pembayaran(){
	 if($this->MKelola_status_pembayaran->hapus_status_pembayaran($this->id_status) == TRUE){
		$this->session->set_flashdata('pesan',$this->pesan('success','Data status pembayaran berhasil dihapus.'));
		redirect('user/status-pembayaran');
	}
	else {
			$this->session->set_flashdata('pesan',$this->pesan('danger','Data status pembayaran yang Anda minta tidak ditemukan...'));
			redirect('user/status-pembayaran');
		 }
	}
}
