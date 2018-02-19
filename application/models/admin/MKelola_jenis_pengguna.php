<?php
class MKelola_jenis_pengguna extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
		public function laporan_jenis_pengguna()
        {
			$kueri = $this->db->get("tbjenis_pengguna");
			if($kueri->num_rows() <1) RETURN "Data Jenis Pengguna Kosong....";
			else RETURN $kueri->result();
		 }
		 
		public function tambah_jenis_pengguna(){
		$data_jenis = array('nm_jenis'=>$this->input->post('Tnm_jenis',true));
		return (($this->db->insert('tbjenis_pengguna',$data_jenis)) ? TRUE : FALSE );
		}
		public function edit_jenis_pengguna($id){
		$jenis_pengguna = array('nm_jenis'=>$this->input->post('Tnm_jenis',TRUE));
		return (($this->db->where('id_jenis',$id)->update('tbjenis_pengguna',$jenis_pengguna)) ? TRUE : FALSE );
		}
		
		public function ambil_jenis_pengguna($id){
		$kueri = $this->db->where('id_jenis',$id)->get('tbjenis_pengguna');
		if($kueri->num_rows() < 1) RETURN FALSE;
		else RETURN $kueri->row();
		}
		public function jenis_pengguna()
		{
			$kueri = $this->db->select('id_jenis,nm_jenis')->get('tbjenis_pengguna')->result();
			$hasil['0']='-- Pilih Jenis Pengguna --';
			foreach ($kueri as $isi)
			{
				$hasil[$isi->id_jenis]=$isi->nm_jenis;
			}
			RETURN $hasil;
		}
		public function hapus_jenis_pengguna($id){
			if($this->ambil_jenis_pengguna($id)){
				return $this->db->query('delete from tbjenis_pengguna where id_jenis='.$id.';');
			}
			else RETURN FALSE;
		}
}
		
