<?php if (!defined('BASEPATH')) exit('No direct script access
allowed');

 class Akses
 {
 public $user;

 /**
 * Constructor
 */
function __construct()
 {
	$this->CI =& get_instance();
	$auth = $this->CI->config->item('auth');
	$this->CI->load->helper(array('cookie','security'));
	$this->CI->load->database();
	$this->CI->load->library('user_agent');
	$this->CI->load->model('Info_pengguna');
	$this->info_pengguna =& $this->CI->info_pengguna;
 }

 function cek_akses($jenis)
 {
	if(!empty($this->CI->session->id_pengguna))
	{
		if($this->CI->session->nm_jenis != $jenis)
		{
			$this->CI->session->set_flashdata('pesan','<div class="alert alert-danger">Halaman yang Anda minta tidak ditemukan!</div>');
			redirect('');
		}
	}
	else
	{
		$this->CI->session->set_flashdata('pesan','<div class="alert alert-danger">Anda harus masuk terlebih dahulu!</div>');
		redirect('masuk');
	}
 }
 
 function cek_login(){
	if(empty($this->CI->session->id_pengguna))
	{
		$this->CI->session->set_flashdata('pesan','<div class="alert alert-danger">Anda harus masuk terlebih dahulu!</div>');
		redirect('masuk');
	}
 }
 
 function logout()
 {
	if(!empty($this->CI->session->id_pengguna))
	{ 
	$this->CI->session->sess_destroy();
	$this->CI->session->set_flashdata('login_berhasil','Anda berhasil keluar dari sistem!');
	redirect(' ');
	}
	else redirect(' ');
 }
}
