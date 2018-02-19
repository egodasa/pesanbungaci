<?php if (! defined('BASEPATH')) exit('No direct script access Hallowed');
class Mendaftar extends Shallom
{
 function __construct()
 {
	parent::__construct();
	if(!empty($this->session->id_pengguna)) redirect('');
	$this->load->helper(array('url','form'));
	$this->load->database();
	$this->load->library(array('form_validation','access','session'));
	$this->load->model('publik/Mmendaftar');
 }
function mendaftar()
 { 	
	//$this->access->cek_izin();
	$data['judul']="Mendaftar";
	if($this->form_validation->run('publik_mendaftar') === TRUE)
	{
		$this->konsol('validasi berhasil');
		if($this->Mmendaftar->mendaftar() === TRUE)
		{
			$this->session->set_flashdata('pesan',$this->pesan('success','Anda berhasil mendaftar di website Kami.'));
			redirect('masuk');
		}
		else $this->konsol('database mendaftar gagal');
	}
	else
	{
		$this->konsol('validasi gagal');
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
		
		if(empty(form_error('Tnm_pengguna'))) $this->session->set_flashdata('Tnm_pengguna','');
		else $this->session->set_flashdata('Tnm_pengguna','has-error');
		
		$this->template('publik/mendaftar','Mendaftar',2);
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
}

