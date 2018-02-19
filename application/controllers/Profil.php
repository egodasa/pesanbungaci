<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Profil extends Shallom
{
 function __construct()
 {
	parent::__construct();
	$this->load->library('akses');
	$this->akses->cek_login();
	$this->load->database();
	$this->load->model('Mprofil');
	//$this->cek_status_login('Admin');
}
 function profil()
 {
	$id_pengguna = $this->session->id_pengguna;
	$data = $this->Mprofil->profil($id_pengguna);
	$data['judul']='Profil Anda';
	$this->load->view('/template/2/head',$data);
	$this->load->view('/template/2/style');
	$this->load->view('/template/2/navbar',$data);
	$this->load->view('/template/2/sidebar',$data);
	$this->load->view('profil',$data);
	$this->load->view('/template/2/footer');
 }
 function ganti_profil(){
	$id_pengguna = $this->session->id_pengguna;
	$data = $this->Mprofil->profil($id_pengguna);
	$data['judul']='Ganti Profil';
	 if($this->form_validation->run('ganti_profil') === TRUE)
		{
			$this->konsol('validasi true');
			if($this->Mprofil->ganti_profil($id_pengguna) === TRUE) 
			{
				$this->session->set_flashdata('pesan',$this->pesan('success','Profil berhasil diubah.'));
				redirect('user/profil');
			}
			else log_message('info','edit gagal db');
		}
		else
		{
			$this->konsol('validasi false');
			
			if(empty(form_error('Tnohp'))){
				$this->konsol('error tnohp kosong');
				$this->session->set_flashdata('Tnohp','');
			}
			else{
				$this->konsol('error tnohp berisi');
				$this->session->set_flashdata('Tnohp','has-error');
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
	$this->load->view('/template/2/head',$data);
	$this->load->view('/template/2/style');
	$this->load->view('/template/2/navbar',$data);
	$this->load->view('/template/2/sidebar',$data);
	$this->load->view('ganti-profil',$data);
	$this->load->view('/template/2/footer');
 }
}
function ganti_password(){
	$id_pengguna = $this->session->id_pengguna;
	if($this->form_validation->run('ganti_password')){
		$this->Mprofil->ganti_password($id_pengguna);
		$this->session->set_flashdata('pesan',$this->pesan('success','Password berhasil diubah.'));
		redirect('user/profil');
	}
	else{
		if(empty(form_error('Tsandi_lama'))) $this->session->set_flashdata('Tsandi_lama','');
		else $this->session->set_flashdata('Tsandi_lama','has-error');
		
		if(empty(form_error('Tsandi1'))) $this->session->set_flashdata('Tsandi1','');
		else $this->session->set_flashdata('Tsandi1','has-error');
		
		if(empty(form_error('Tsandi2'))) $this->session->set_flashdata('Tsandi2','');
		else $this->session->set_flashdata('Tsandi2','has-error');
	}
	$data['judul'] = 'Ganti Password';
	$this->load->view('/template/2/head',$data);
	$this->load->view('/template/2/style');
	$this->load->view('/template/2/navbar',$data);
	$this->load->view('/template/2/sidebar',$data);
	$this->load->view('ganti-password',$data);
	$this->load->view('/template/2/footer');
}
function cek_sandi(){
	$id_pengguna = $this->session->id_pengguna;
	if($this->Mprofil->cek_sandi($id_pengguna)) RETURN TRUE;
	else {
		$this->form_validation->set_message('cek_sandi','Kata Sandi lama Anda salah!');
		RETURN FALSE;
	}
}
}
