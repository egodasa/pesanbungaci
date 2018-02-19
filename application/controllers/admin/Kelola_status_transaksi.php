<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Kelola_status_transaksi extends Shallom
{
	public $id_status;
 function __construct()
 {
	parent::__construct();
	$this->load->library('akses');
	$this->akses->cek_akses('Admin');
	$this->load->database();
	$this->load->model('admin/MKelola_status_transaksi');
	//$this->cek_login('Admin');
	$this->id_status= $this->input->get('id_status');
}
 function laporan_status_transaksi()
 {
	    $this->tambah_status_transaksi();
		$data['laporan']=$this->MKelola_status_transaksi->laporan_status_transaksi();
		$data['judul']='Kelola Daftar Status Transaksi';
		$this->load->view('/template/2/head',$data); 
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('admin/laporan-status-transaksi',$data);
		$this->load->view('/template/2/footer');
 }
 function tambah_status_transaksi(){
	 if($this->form_validation->run('admin_data_status_transaksi') === TRUE)
		{
			$this->MKelola_status_transaksi->tambah_status_transaksi();
			$this->session->set_flashdata('pesan',$this->pesan('success','Data status transaksi baru berhasil ditambahkan.'));
		}
		else
		{
			if(empty(form_error('Tnm_status_transaksi'))) $this->session->set_flashdata('Tnm_status_transaksi','');
			else $this->session->set_flashdata('Tnm_status_transaksi','has-error');
		}
 }
 function edit_status_transaksi(){
	 if($this->MKelola_status_transaksi->ambil_status_transaksi($this->id_status)){
		 $data['detail'] = $this->MKelola_status_transaksi->ambil_status_transaksi($this->id_status);
		 $data['judul'] = 'Edit Status Transaksi';
		 $this->load->view('/template/2/head',$data); 
	     $this->load->view('/template/2/style');
		 $this->load->view('/template/2/navbar',$data);
		 $this->load->view('/template/2/sidebar',$data);
		 if($this->form_validation->run('admin_data_status_transaksi') === TRUE)
			{
				if($this->MKelola_status_transaksi->edit_status_transaksi($this->id_status) === TRUE) 
				{
					$this->session->set_flashdata('pesan',$this->pesan('success','Data status transaksi berhasil diubah.'));
					redirect('user/status-transaksi');
				}
				else echo "<script>console.log('registrasi berhasil');</script>";
			}
			else
			{
				echo "<script>console.log('registrasi gagal');</script>";
				if(empty(form_error('Tnm_status_transaksi'))) $this->session->set_flashdata('Tnm_status_transaksi','');
				else $this->session->set_flashdata('Tnm_status_transaksi','has-error');
			}
	 	 $this->load->view('admin/edit-status-transaksi',$data);
		 $this->load->view('/template/2/footer');
	 }
	 else{
		$this->session->set_flashdata('pesan',$this->pesan('danger','Data status transaksi yang Anda minta tidak ditemukan...'));
		redirect('user/status-transaksi');
	 }
 }
  function hapus_status_transaksi(){
	 if($this->MKelola_status_transaksi->hapus_status_transaksi($this->id_status) == TRUE){
		$this->session->set_flashdata('pesan',$this->pesan('success','Data status transaksi berhasil dihapus.'));
		redirect('user/status-transaksi');
	}
	else{
		$this->session->set_flashdata('pesan',$this->pesan('danger','Data status transaksi yang Anda minta tidak ditemukan...'));
		redirect('user/status-transaksi');
	 }
	}
}
