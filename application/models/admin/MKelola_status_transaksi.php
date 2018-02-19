<?php
class MKelola_status_transaksi extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
		public function laporan_status_transaksi()
        {
			$kueri = $this->db->get("tbstatus_transaksi");
			if($kueri->num_rows() < 1) RETURN "Data Status Transaksi Kosong...";
			else RETURN $kueri->result();
		 }
		 
		public function tambah_status_transaksi(){
		$data_status_transaksi = array('nm_status_transaksi'=>$this->input->post('Tnm_status_transaksi',true));
		return (($this->db->insert('tbstatus_transaksi',$data_status_transaksi)) ? TRUE : FALSE );
		}
		
		public function edit_status_transaksi($id){
		$status = array('nm_status_transaksi'=>$this->input->post('Tnm_status_transaksi',TRUE));
		return (($this->db->where('id_status_transaksi',$id)->update('tbstatus_transaksi',$status)) ? TRUE : FALSE );
		}
		
		public function ambil_status_transaksi($id){
		$kueri = $this->db->where('id_status_transaksi',$id)->get('tbstatus_transaksi');
		if($kueri->num_rows() < 1) RETURN FALSE;
		else RETURN $kueri->row(); 
		}
		public function hapus_status_transaksi($id){
			if($this->ambil_status_transaksi($id)){
			return $this->db->query('delete from tbstatus_transaksi where id_status_transaksi='.$id.';');
			}
			else RETURN FALSE;
		}
}
		
