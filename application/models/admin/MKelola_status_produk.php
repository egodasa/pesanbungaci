<?php
class MKelola_status_produk extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
		public function laporan_status_produk()
        {
			$kueri = $this->db->get("tbstatus_produk");
			if($kueri->num_rows() < 1) RETURN "Data Status Produk Kosong....";
			else RETURN $kueri->result();
		 }
		 
		public function tambah_status_produk(){
		$data_status_produk = array('nm_status_produk'=>$this->input->post('Tnm_status_produk',true));
		return (($this->db->insert('tbstatus_produk',$data_status_produk)) ? TRUE : FALSE );
		}
		
		public function edit_status_produk($id){
		$status = array('nm_status_produk'=>$this->input->post('Tnm_status_produk',TRUE));
		return (($this->db->where('id_status_produk',$id)->update('tbstatus_produk',$status)) ? TRUE : FALSE );
		}
		
		public function ambil_status_produk($id){
		$kueri = $this->db->where('id_status_produk',$id)->get('tbstatus_produk');
		if($kueri->num_rows() < 1) RETURN FALSE;
		else RETURN $kueri->row();
		}
		public function hapus_status_produk($id){
			if($this->ambil_status_produk($id)){
			RETURN $this->db->query('delete from tbstatus_produk where id_status_produk='.$id.';');
			}
			else RETURN FALSE;
		}
}
		
