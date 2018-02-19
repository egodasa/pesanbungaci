<?php
class MKelola_jenis_acara extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
		public function laporan_jenis_acara()
        {
			$kueri = $this->db->get("tbjenis_acara");
			if($kueri->num_rows() < 1) RETURN "Data Jenis Acara Kosong...";
			else RETURN $kueri->result();
		 }
		 
		public function tambah_jenis_acara(){
		$data_jenis = array('nm_acara'=>$this->input->post('Tnm_acara',true));
		return (($this->db->insert('tbjenis_acara',$data_jenis)) ? TRUE : FALSE );
		}
		public function edit_jenis_acara($id){
		$nm_acara = $this->input->post('Tnm_acara',TRUE);
		return (($this->db->set('nm_acara',$nm_acara)->where('id_acara',$id)->update('tbjenis_acara')) ? TRUE : FALSE );
		}
		
		public function ambil_jenis_acara($id){
		$kueri = $this->db->where('id_acara',$id)->get('tbjenis_acara');
		if($kueri->num_rows() < 1) RETURN FALSE;
		else RETURN $kueri->row();
		}
		public function jenis_acara()
		{
			$kueri = $this->db->select('id_acara,nm_acara')->get('tbjenis_acara')->result();
			$hasil['0']='-- Pilih Jenis acara --';
			foreach ($kueri as $isi)
			{
				$hasil[$isi->id_acara]=$isi->nm_acara;
			}
			RETURN $hasil;
		}
		public function hapus_jenis_acara($id){
			if($this->ambil_jenis_acara($id)){
			return $this->db->query('delete from tbjenis_acara where id_acara='.$id.';');
		}
		else RETURN FALSE;
		}
}
		
