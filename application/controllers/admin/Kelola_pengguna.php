<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Kelola_pengguna extends Shallom
{
	public $id_pengguna;
 function __construct()
 {
	parent::__construct();
	$this->load->library('akses');
	$this->akses->cek_akses('Admin');
	$this->load->database();
	$this->load->model('admin/MKelola_pengguna');
	$this->load->model('admin/MKelola_jenis_pengguna');
	//$this->cek_login('Admin');
	$this->id_pengguna = $this->input->get('id_pengguna');
}
 function laporan_pengguna()
 {
		$data['laporan']=$this->MKelola_pengguna->laporan_pengguna($this->input->get('urutkan'));
		$data['judul']='Kelola Pengguna';
		$this->load->view('/template/2/head',$data); 
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('admin/laporan-pengguna',$data);
		$this->load->view('/template/2/footer');
 }
 function tambah_pengguna(){
	 if($this->form_validation->run('admin_data_pengguna') === TRUE)
		{
			if($this->MKelola_pengguna->tambah_pengguna() === TRUE) 
			{
				log_message('info','tambah berhasil');
				$this->session->set_flashdata('pesan',$this->pesan('success','Data Pengguna baru berhasil ditambahkan.'));
				redirect('user/pengguna');
			}
			else log_message('info','tambah gagal');
		}
		else
		{
			if(empty(form_error('Tnm_pengguna'))) $this->session->set_flashdata('Tnm_pengguna','');
			else $this->session->set_flashdata('Tnm_pengguna','has-error');
			
			if(empty(form_error('Tusername'))) $this->session->set_flashdata('Tusername','');
			else $this->session->set_flashdata('Tusername','has-error');
			
			if(empty(form_error('Tsandi1'))) $this->session->set_flashdata('Tsandi1','');
			else $this->session->set_flashdata('Tsandi1','has-error');
			
			if(empty(form_error('Tsandi2'))) $this->session->set_flashdata('Tsandi2','');
			else $this->session->set_flashdata('Tsandi2','has-error');
			
			if(empty(form_error('Tnohp'))) $this->session->set_flashdata('Tnohp','');
			else $this->session->set_flashdata('Tnohp','has-error');
			
			if(empty(form_error('Temail'))) $this->session->set_flashdata('Temail','');
			else $this->session->set_flashdata('Temail','has-error');
			
			if(empty(form_error('Cjenis'))) $this->session->set_flashdata('Cjenis','');
			else $this->session->set_flashdata('Cjenis','has-error');
		}
		$data['judul']='Kelola Pengguna';
		$data['jenis']=$this->data_combobox($this->db->get('tbjenis_pengguna')->result(),'id_jenis','nm_jenis','-- Jenis Pengguna --');
		$this->load->view('/template/2/head',$data); 
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('admin/tambah-pengguna',$data);
		$this->load->view('/template/2/footer');
 }
 function edit_pengguna(){
	if($this->MKelola_pengguna->ambil_pengguna($this->id_pengguna)){
		$data['detail'] = $this->MKelola_pengguna->ambil_pengguna($this->id_pengguna);
		$data['judul']='Edit Informasi Pengguna';
		$data['jenis']=$this->data_combobox($this->db->get('tbjenis_pengguna')->result(),'id_jenis','nm_jenis','-- Jenis Pengguna --');;
		$this->load->view('/template/2/head',$data); 
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		 if($this->form_validation->run('admin_edit_pengguna') === TRUE)
			{
				$this->konsol('validasi true');
				if($this->MKelola_pengguna->edit_pengguna($this->id_pengguna) === TRUE) 
				{
					$this->session->set_flashdata('pesan',$this->pesan('success','Data Pengguna berhasil diubah.'));
					redirect('user/pengguna');
				}
				else log_message('info','edit gagal db');
			}
			else
			{
				if(empty(form_error('Tusername'))){
					$this->konsol('error tusername kosong');
					$this->session->set_flashdata('Tusername','');
				}
				else{
					$this->konsol('error tusername berisi',$this->input->post('Tusername'));
					$this->session->set_flashdata('Tusername','has-error');
				}
				
				if(empty(form_error('Tnohp'))){
					$this->konsol('error tnohp kosong');
					$this->session->set_flashdata('Tnohp','');
				}
				else{
					$this->konsol('error tnohp berisi');
					$this->session->set_flashdata('Tnohp','has-error');
				}
				
				if(empty(form_error('Cjenis'))){
					$this->konsol('error cjenis kosong');
					$this->session->set_flashdata('Cjenis','');
				}
				else{
					$this->konsol('error cjenis berisi');
					$this->session->set_flashdata('Cjenis','has-error');
				}
				
				if(empty(form_error('Temail'))){
					$this->konsol('error temail kosong');
					$this->session->set_flashdata('Temail','');
				}
				else{
					$this->konsol('error temail berisi');
					$this->session->set_flashdata('Temail','has-error');
				}
				
				if(empty(form_error('Tnm_pengguna'))){
					$this->konsol('error Tnm_pengguna kosong');
					$this->session->set_flashdata('Tnm_pengguna','');
				}
				else{
					$this->konsol('error Tnm_pengguna berisi');
					$this->session->set_flashdata('Tnm_pengguna','has-error');
				}
				
	 }
			$this->load->view('admin/edit-pengguna',$data);
			$this->load->view('/template/2/footer');
		}
		else{
			$this->session->set_flashdata('pesan',$this->pesan('danger','Data Pengguna yang Anda minta tidak ditemukan...'));
			redirect('user/pengguna');
		}
 }
 function hapus_pengguna(){
	 if($this->MKelola_pengguna->hapus_pengguna($this->id_pengguna) == TRUE){
		$this->session->set_flashdata('pesan',$this->pesan('success','Data Pengguna berhasil dihapus.'));	 
		redirect('user/pengguna');
		}
		else{
		$this->session->set_flashdata('pesan',$this->pesan('danger','Data Pengguna yang Anda minta tidak ditemukan...'));	 
		redirect('user/pengguna');
		}
	}
function cek_sandi()
 {
	 $this->form_validation->set_message('cek_sandi','Kata Sandi tidak cocok!');
	 $sandi1=md5($this->input->post('Tsandi1'));
	 $sandi2=md5($this->input->post('Tsandi2'));
	 if($sandi2 === $sandi1) return TRUE;
	 else return FALSE;
 }
 function validasi_jenis(){
	if($this->input->post('Cjenis') == '0')
	{
		$this->form_validation->set_message('validasi_jenis','Jenis Pengguna Harus Dipilih!');
		RETURN FALSE;
	}
	else RETURN TRUE;
 }
}
