<?php
class MKelola_kota extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
		public function laporan_kota($filter = '')
        {
			if(empty($this->input->get('cari'))){
				switch($filter){
				case 'kota_asc' : {
					$urutkan = "order by nm_kota asc";
					break;
					}
				case 'kota_desc' : {
					$urutkan = "order by nm_kota desc";
					break;
					}
				
				case 'tarif_asc' : {
					$urutkan = "order by hrg_kota asc";
					break;
					}
				
				case 'tarif_desc' : {
					$urutkan = "order by hrg_kota desc";
					break;
					}
				default : $urutkan = "";
				}
				$kueri = $this->db->query("select * from tbkota $urutkan;");
				if($kueri->num_rows() < 1) RETURN "Data Kota Kosong...";
				else RETURN $kueri->result();
			}
			else {
				$kueri = $this->db->query("select * from tbkota where nm_kota like '%".$this->input->get('cari')."%';");
				if($kueri->num_rows() < 1) RETURN "<p class='text-center'>Tidak Ditemukan Hasil Pencarian <b>".$this->input->get('cari')."</b>.</p>";
				else RETURN $kueri->result();
			}
		 }
		 
		public function tambah_kota(){
		$data_kota = array('nm_kota'=>$this->input->post('Tnm_kota',true),'hrg_kota'=>$this->input->post('Thrg_kota',true));
		return (($this->db->insert('tbkota',$data_kota)) ? TRUE : FALSE );
		}
		
		public function edit_kota($id){
		$data_kota = array('nm_kota'=>$this->input->post('Tnm_kota',true),'hrg_kota'=>$this->input->post('Thrg_kota',true));
		return (($this->db->where('id_kota',$id)->update('tbkota',$data_kota)) ? TRUE : FALSE );
		}
		
		public function ambil_kota($id){
		$kueri = $this->db->where('id_kota',$id)->get('tbkota');
		if($kueri->num_rows() < 1) RETURN FALSE;
		else RETURN $kueri->row();
		}
		public function hapus_kota($id){
			if($this->ambil_kota($id)){
			return (($this->db->query('delete from tbkota where id_kota='.$id.';')) ? TRUE : FALSE );
			}
			else RETURN FALSE;
		}
}
		
