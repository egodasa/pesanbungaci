<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Kelola_jenis_acara extends Shallom
{
	public $id_acara;
 function __construct()
 {
	parent::__construct();
	$this->load->library('akses');
	$this->akses->cek_akses('Admin');
	$this->load->database();
	$this->load->model('admin/MKelola_jenis_acara');
	//$this->cek_status_login('Admin');
	$this->id_acara = $this->input->get('id_acara');
}
 function laporan_jenis_acara()
 {
		$this->tambah_jenis_acara();
		$data['laporan']=$this->MKelola_jenis_acara->laporan_jenis_acara();
		$data['acara']=$this->MKelola_jenis_acara->jenis_acara();
		$data['judul']='Kelola Jenis Acara';
		$this->load->view('/template/2/head',$data);
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('admin/laporan-jenis-acara',$data);
		$this->load->view('/template/2/footer');
 }
 function tambah_jenis_acara(){
	 if($this->form_validation->run('admin_data_jenis_acara') == TRUE)
		{
			$this->konsol('form validasi true');
			if($this->MKelola_jenis_acara->tambah_jenis_acara('tambah_jenis_acara') == TRUE)
			{
				$this->konsol('insert db true');
				$this->session->set_flashdata('pesan',$this->pesan('success','Data Jenis Acara baru berhasil ditambahkan.'));
			}
			else echo $this->konsol('insert db false');
		}
		else
		{
			$this->konsol('form validasi false');

			if(empty(form_error('Tnm_acara')))
			{
				$this->konsol('tnm_acara error kosong');
				$this->session->set_flashdata('Tnm_acara','');
			}
			else
			{
				$this->konsol('tnm_acara error berisi');
				$this->session->set_flashdata('Tnm_acara','has-error');
			}
		}
 }
 function edit_jenis_acara(){
	 if($this->MKelola_jenis_acara->ambil_jenis_acara($this->id_acara)){
		 $data['detail'] = $this->MKelola_jenis_acara->ambil_jenis_acara($this->id_acara);
		 $data['judul'] = 'Edit Informasi acara';
		 if($this->form_validation->run('admin_data_jenis_acara') === TRUE)
			{
				if($this->MKelola_jenis_acara->edit_jenis_acara($this->id_acara) === TRUE)
				{
					$this->session->set_flashdata('pesan',$this->pesan('success','Data Jenis Acara berhasil diubah.'));
					redirect('user/jenis-acara');
				}
				else echo "<script>console.log('registrasi berhasil');</script>";
			}
			else
			{
				echo "<script>console.log('registrasi gagal');</script>";
				if(empty(form_error('Tnm_acara'))) $this->session->set_flashdata('Tnm_acara','');
				else $this->session->set_flashdata('Tnm_acara','has-error');
	 }
			$this->load->view('/template/2/head',$data);
			$this->load->view('/template/2/style');
			$this->load->view('/template/2/navbar',$data);
			$this->load->view('/template/2/sidebar',$data);
			$this->load->view('admin/edit-jenis-acara',$data);
			$this->load->view('/template/2/footer');
		}
		else{
			$this->session->set_flashdata('pesan',$this->pesan('danger','Data Jenis Acara tidak ditemukan...'));
			redirect('user/jenis-acara');
		}
 }
  function hapus_jenis_acara(){
	if($this->MKelola_jenis_acara->hapus_jenis_acara($this->id_acara)){
		$this->session->set_flashdata('pesan',$this->pesan('success','Data Jenis Acara berhasil dihapus.'));
		redirect('user/jenis-acara');
	}
	else{
			$this->session->set_flashdata('pesan',$this->pesan('danger','Data Jenis Acara tidak ditemukan...'));
			redirect('user/jenis-acara');
		}
	}
}
