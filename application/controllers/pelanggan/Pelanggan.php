<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Pelanggan extends Shallom
{
function __construct()
 {
	parent::__construct();
	$this->load->database();
	$this->load->library('akses');
	//$this->cek_status_login('Admin');
}
function keluar(){
	$this->akses->logout();
}
}
