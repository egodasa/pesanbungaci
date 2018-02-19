<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Kelola_kota extends Shallom
{
	public $id_kota;
 function __construct()
 {
	parent::__construct();
	$this->load->library('akses');
	$this->akses->cek_akses('Admin');
	$this->load->database();
	$this->load->model('admin/MKelola_kota');
	//$this->cek_login('Admin');
	$this->id_kota = $this->input->get('id_kota');
}
 function laporan_kota()
 {
	    $this->tambah_kota();
		$data['laporan']=$this->MKelola_kota->laporan_kota($this->input->get('urutkan'));
		$data['judul']='Kelola Daftar kota';
		$this->load->view('/template/2/head',$data); 
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('admin/laporan-kota',$data);
		$this->load->view('/template/2/footer');
 }
 function tambah_kota(){
	 if($this->form_validation->run('admin_data_kota') === TRUE)
		{
			$this->MKelola_kota->tambah_kota();
			$this->session->set_flashdata('pesan',$this->pesan('success','Data Kota baru berhasil ditambahkan.'));
		}
		else
		{
			if(empty(form_error('Tnm_kota'))) $this->session->set_flashdata('Tnm_kota','');
			else $this->session->set_flashdata('Tnm_kota','has-error');
			
			if(empty(form_error('Thrg_kota'))) $this->session->set_flashdata('Thrg_kota','');
			else $this->session->set_flashdata('Thrg_kota','has-error');
		}
 }
 function edit_kota(){
	 if($this->MKelola_kota->ambil_kota($this->id_kota)){
		 $data['detail'] = $this->MKelola_kota->ambil_kota($this->id_kota);
		 $data['judul'] = 'Edit Informasi kota';
		 $this->load->view('/template/2/head',$data); 
	     $this->load->view('/template/2/style');
		 $this->load->view('/template/2/navbar',$data);
		 $this->load->view('/template/2/sidebar',$data);
		 if($this->form_validation->run('admin_data_kota') === TRUE)
			{
				if($this->MKelola_kota->edit_kota($this->id_kota) === TRUE) 
				{
					$this->session->set_flashdata('pesan',$this->pesan('success','Data Kota berhasil diubah.'));
					redirect('user/kota');
				}
				else echo "<script>console.log('registrasi berhasil');</script>";
			}
			else
			{
				echo "<script>console.log('registrasi gagal');</script>";
				if(empty(form_error('Tnm_kota'))) $this->session->set_flashdata('Tnm_kota','');
				else $this->session->set_flashdata('Tnm_kota','has-error');
				
				if(empty(form_error('Thrg_kota'))) $this->session->set_flashdata('Thrg_kota','');
				else $this->session->set_flashdata('Thrg_kota','has-error');
			}
	 	 $this->load->view('admin/edit-kota',$data);
		 $this->load->view('/template/2/footer');
		 }
		 else {
			$this->session->set_flashdata('pesan',$this->pesan('danger','Data Kota yang Anda minta tidak ditemukan...'));
			redirect('user/kota');
		 }
 }
  function hapus_kota(){
	 if($this->MKelola_kota->hapus_kota($this->id_kota)){
		$this->session->set_flashdata('pesan',$this->pesan('success','Data Kota berhasil dihapus.'));
		redirect('user/kota');
	}
	else {
			$this->session->set_flashdata('pesan',$this->pesan('danger','Data Kota yang Anda minta tidak ditemukan...'));
			redirect('user/kota');
		 }
	}
}
