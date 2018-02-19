<?php
class Mmendaftar extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
        public function mendaftar()
        {
		 $sandi = md5($this->input->post('Tsandi1',TRUE));
		 $daftar=array(
		 'username'=>$this->input->post('Tusername',TRUE),
		 'nm_pengguna'=>$this->input->post('Tnm_pengguna',TRUE),
		 'password'=>$sandi,
		 'nohp'=>$this->input->post('Tnohp',TRUE),
		 'email'=>$this->input->post('Temail',TRUE)
		 );
		 return (($this->db->insert('tbpengguna',$daftar)) ? TRUE : FALSE);
		}
}
