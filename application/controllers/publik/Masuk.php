<?php if (! defined('BASEPATH')) exit('No direct script access Hallowed');
class Masuk extends Shallom
{
 function __construct()
 {
	parent::__construct();
	if(!empty($this->session->id_pengguna)) redirect('');
	$this->load->helper(array('url','form'));
	$this->load->database();
	$this->load->library(array('form_validation','session'));
	$this->load->model('publik/Mmasuk');
 }
 
 function masuk(){
 	if($this->form_validation->run('publik_masuk')){
		$this->session->set_flashdata('pesan',$this->pesan('success','Anda berhasil login.'));
		redirect('/');
	}
	else{
		if(empty(form_error('Tusername'))) {
			$this->session->set_flashdata('Tusername','');
			$this->konsol('username betul');
		}
		else{
			$this->session->set_flashdata('Tusername','has-error');
			$this->konsol('username salah');
		}
		
		if(empty(form_error('Tsandi'))){
			$this->session->set_flashdata('Tsandi','');
			$this->konsol('sandi betul');
		}
		else{
			$this->session->set_flashdata('Tsandi','has-error');
			$this->konsol('sandi salah');
		}
		if(empty(form_error('Tkecocokan'))){
			$this->konsol('login cocok');
		}
		else{
			$this->konsol('login tdk cocok');
		}
	}
	$this->template('/publik/masuk','Masuk',2);
 }
 
 function cek_login(){
	$username=$this->input->post('Tusername',TRUE);
	$password=$this->input->post('Tsandi',TRUE);
	$login = $this->db->where(array('username'=>$username,'password'=>md5($password)))->get('tbpengguna')->result_array();
	if(empty($username) || empty($password)){
		$this->form_validation->set_message('cek_login','Username dan password harus di isi!');
		return FALSE;
	}else{
		if(count($login) == 0){
			$this->form_validation->set_message('cek_login','Username dan Kata Sandi tidak cocok!');
			return FALSE;
		}else{
			$this->pasang_sesi($login[0]);
			return true;
		}
	}
 }
 function pasang_sesi($u){
	$info = array(
	'id_pengguna'=>$u['id_pengguna'],
	'username'=>$u['username'],
	'id_jenis'=>$u['id_jenis']);
	$this->session->set_userdata($info);
	return TRUE;
 }
}
