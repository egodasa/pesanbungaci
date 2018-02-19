<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Kelola_jenis_pengguna extends Shallom
{
	public $id_jenis;
 function __construct()
 {
	parent::__construct();
	$this->load->library('akses');
	$this->akses->cek_akses('Admin');
	$this->load->database();
	$this->load->model('admin/MKelola_jenis_pengguna');
	//$this->cek_login('Admin');
	$this->id_jenis = $this->input->get('id_jenis');
}
 function laporan_jenis_pengguna()
 {
	    $this->tambah_jenis_pengguna();
		$data['laporan']=$this->MKelola_jenis_pengguna->laporan_jenis_pengguna();
		$data['judul']='Kelola Jenis Pengguna';
		$this->load->view('/template/2/head',$data); 
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('admin/laporan-jenis-pengguna',$data);
		$this->load->view('/template/2/footer');
 }
 function tambah_jenis_pengguna(){
	 if($this->form_validation->run('admin_data_jenis_pengguna') == TRUE)
		{
			log_message('info','form validation true');
			if($this->MKelola_jenis_pengguna->tambah_jenis_pengguna('tambah_jenis_pengguna') == TRUE) 
			{
				log_message('info','mjenis jalan');
				$this->session->set_flashdata('pesan',$this->pesan('success','Data Jenis Pengguna baru berhasil ditambahkan.'));
			}
			else {
				echo "<script>console.log('mjenis ndak jalan');</script>";
				echo $this->konsol('mjenis false');	
			}
		}
		else
		{
			echo "<script>console.log('form validation ndak jalan');</script>";
			if(empty(form_error('Tnm_jenis'))) $this->session->set_flashdata('Tnm_jenis','');
			else $this->session->set_flashdata('Tnm_jenis','has-error');
		}
 }
 function edit_jenis_pengguna(){
	 if($this->MKelola_jenis_pengguna->ambil_jenis_pengguna($this->id_jenis)){
		 $data['detail'] = $this->MKelola_jenis_pengguna->ambil_jenis_pengguna($this->id_jenis);
		 $data['judul'] = 'Edit Informasi Jenis Pengguna';
		 if($this->form_validation->run('admin_data_jenis_pengguna') === TRUE)
			{
				if($this->MKelola_jenis_pengguna->edit_jenis_pengguna($this->id_jenis) === TRUE) 
				{
					$this->session->set_flashdata('pesan',$this->pesan('success','Data Jenis Pengguna berhasil diubah.'));
					redirect('user/jenis-pengguna');
				}
				else echo "<script>console.log('registrasi berhasil');</script>";
			}
			else
			{
				echo "<script>console.log('registrasi gagal');</script>";
				if(empty(form_error('Tnm_jenis'))) $this->session->set_flashdata('Tnm_jenis','');
				else $this->session->set_flashdata('Tnm_jenis','has-error');
			}
			$this->load->view('/template/2/head',$data); 
			$this->load->view('/template/2/style');
			$this->load->view('/template/2/navbar',$data);
			$this->load->view('/template/2/sidebar',$data);
			$this->load->view('admin/edit-jenis-pengguna',$data);
			$this->load->view('/template/2/footer');
		}
		else {
			$this->session->set_flashdata('pesan',$this->pesan('danger','Data Jenis Pengguna tidak ditemukan....'));		 
			redirect('user/jenis-pengguna');
		}
 }
  function hapus_jenis_pengguna(){
	 if($this->MKelola_jenis_pengguna->hapus_jenis_pengguna($this->id_jenis)){
		$this->session->set_flashdata('pesan',$this->pesan('success','Data Jenis Pengguna berhasil dihapus.'));		 
		redirect('user/jenis-pengguna');
	}else {
			$this->session->set_flashdata('pesan',$this->pesan('danger','Data Jenis Pengguna tidak ditemukan....'));		 
			redirect('user/jenis-pengguna');
		}
	}
}
