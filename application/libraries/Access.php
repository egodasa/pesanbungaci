<?php if (!defined('BASEPATH')) exit('No direct script access
allowed');

 class Access
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
	$this->CI->load->model('Info_pengguna');
	$this->info_pengguna =& $this->CI->info_pengguna;
 }

 /**
 * Cek login user
 */

 function login($username, $password)
 {
	$result = $this->info_pengguna->get_login_info($username);
		if ($result)
		{
			$password = md5($password);
				if ($password === $result->sandi)
				{
					$info = array('id_user'=>$result->id_user,'username'=>$result->username,'jenis'=>$result->jenis);
					$this->CI->session->set_userdata($info);
					return TRUE;
				}
		}
	return FALSE;
 }
 /**
 * cek apakah udah login
 */
 function cek_status_login ()
 {
	if(!empty($this->CI->session->username)) return TRUE;
	else return FALSE;
 }

 function cek_izin()
 {
	 if($this->cek_status_login() === TRUE)
	{
		switch($this->CI->session->nm_jenis)
		{
		case 'Admin' : redirect('admin'); break;
		case 'Administrasi' : redirect('administrasi'); break;
		case 'Pelanggan' : redirect('user'); break;
		case 'Pemimpin' : redirect('pimpinan'); break;
		}
	}
 }
 /**
 * Logout
 *
 */
 function logout ()
 {
	if($this->cek_status_login() === TRUE )
	{ 
	$this->CI->session->sess_destroy();
	redirect(' ');
	}
	else redirect(' ');
 }
}
