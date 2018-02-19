<?php if (!defined('BASEPATH')) exit('No direct script access
allowed');

 class Pengaturan
 {
function __construct()
 {
	$this->CI =& get_instance();
	$this->CI->load->database();
	$this->CI->load->model('Mpengaturan');
 }
function pengaturan(){
	if(!$this->CI->Mpengaturan->pengaturan()){
	$pengaturan['navbar'] = '#B8009B';
	$pengaturan['menu_aktif'] = '#BA008A';
	$pengaturan['sidebar'] = '#B8009B';
	}
	else {
	$pengaturan = $this->CI->Mpengaturan->pengaturan();
	return $pengaturan;
	}
}
}
