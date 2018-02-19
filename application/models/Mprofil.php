<?php
class Mprofil extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
       
public function profil($id_pengguna)
{
	$profil = $this->db->where('id_pengguna',$id_pengguna)->get('tbpengguna')->row_array();
	if(!$profil) die('Tidak dapat terhubung kedatabase.');
	else return $profil;
}

public function ganti_profil($id_pengguna)
{
	$profil = array(
	'nm_pengguna'=>$this->input->post('Tnm_pengguna',TRUE),
	'email'=>$this->input->post('Temail',TRUE),
	'nohp'=>$this->input->post('Tnohp',TRUE)
	);
	if($this->db->set($profil)->where('id_pengguna',$id_pengguna)->update('tbpengguna'))
	{
		return true;
	}
	else return false;
}

public function ganti_password($id_pengguna)
{
	$password = md5($this->input->post('Tsandi1',TRUE));
	if($this->db->set('password',$password)->where('id_pengguna',$id_pengguna)->update('tbpengguna')) RETURN TRUE;
	else RETURN FALSE;
}
public function cek_sandi($id_pengguna){
	$sandi_lama = $this->db->select('password')->where('id_pengguna',$id_pengguna)->get('tbpengguna')->row_array();
	$sandi = md5($this->input->post('Tsandi_lama'));
	if($sandi_lama['password'] == $sandi) RETURN TRUE;
	else RETURN FALSE;
}
}
