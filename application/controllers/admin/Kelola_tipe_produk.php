<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Kelola_tipe_produk extends Shallom
{
	public $id_tipe;
 function __construct()
 {
	parent::__construct();
	$this->load->library('akses');
	$this->akses->cek_akses('Admin');
	$this->load->database();
	$this->load->model('admin/MKelola_tipe_produk');
	//$this->cek_login('Admin');
	$this->id_tipe = $this->input->get('id_tipe');
}
 function laporan_tipe_produk()
 {
	    $this->tambah_tipe_produk();
		$data['laporan']=$this->MKelola_tipe_produk->laporan_tipe_produk();
		$data['tipe']=$this->MKelola_tipe_produk->tipe_produk();
		$data['judul']='Kelola tipe produk';
		$this->load->view('/template/2/head',$data); 
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('admin/laporan-tipe-produk',$data);
		$this->load->view('/template/2/footer');
 }
 function tambah_tipe_produk(){
	 if($this->form_validation->run('admin_data_tipe_produk') == TRUE)
		{
			log_message('info','form validation true');
			if($this->MKelola_tipe_produk->tambah_tipe_produk('tambah_tipe_produk') == TRUE) 
			{
				log_message('info','mtipe jalan');
				$this->session->set_flashdata('pesan',$this->pesan('success','Data Tipe Produk Baru berhasil ditambahkan.'));
			}
			else {
				log_message('info','mtipe ndak jalan');
			}
		}
		else
		{
			log_message('info','validasi ndak jalan');
			if(empty(form_error('Tnm_tipe'))) $this->session->set_flashdata('Tnm_tipe','');
			else $this->session->set_flashdata('Tnm_tipe','has-error');
			
			if(empty(form_error('Thrg_tipe'))) $this->session->set_flashdata('Thrg_tipe','');
			else $this->session->set_flashdata('Thrg_tipe','has-error');
		}
 }
 function edit_tipe_produk(){
	 if($this->MKelola_tipe_produk->ambil_tipe_produk($this->id_tipe)){
		 $data['detail'] = $this->MKelola_tipe_produk->ambil_tipe_produk($this->id_tipe);
		 $data['judul'] = 'Edit Informasi tipe produk';
		 if($this->form_validation->run('admin_data_tipe_produk') === TRUE)
			{
				if($this->MKelola_tipe_produk->edit_tipe_produk($this->id_tipe) === TRUE) 
				{
					$this->session->set_flashdata('pesan',$this->pesan('success','Data Tipe Produk berhasil diubah.'));
					redirect('user/tipe-produk');
				}
				else echo "<script>console.log('registrasi berhasil');</script>";
			}
			else
			{
				echo "<script>console.log('registrasi gagal');</script>";
				if(empty(form_error('Tnm_tipe'))) $this->session->set_flashdata('Tnm_tipe','');
				else $this->session->set_flashdata('Tnm_tipe','has-error');
				
				if(empty(form_error('Thrg_tipe'))) $this->session->set_flashdata('Thrg_tipe','');
				else $this->session->set_flashdata('Thrg_tipe','has-error');
			}
		$this->load->view('/template/2/head',$data); 
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('admin/edit-tipe-produk',$data);
		$this->load->view('/template/2/footer');
		}
			else {
				$this->session->set_flashdata('pesan',$this->pesan('danger','Data Tipe Produk yang Anda minta tidak ditemukan....'));
				redirect('user/tipe-produk');
			} 
 }
  function hapus_tipe_produk(){
	 if($this->MKelola_tipe_produk->hapus_tipe_produk($this->id_tipe)){
		 $this->session->set_flashdata('pesan',$this->pesan('success','Data Tipe Produk berhasil dihapus.'));
		 redirect('user/tipe-produk');
	}
	else {
		$this->session->set_flashdata('pesan',$this->pesan('danger','Data Tipe Produk yang Anda minta tidak ditemukan....'));
		redirect('user/tipe-produk');
		}
	}
}
