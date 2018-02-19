<?php
class MKelola_status_pembayaran extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
		public function laporan_status_pembayaran()
        {
			$kueri = $this->db->get("tbstatus_pembayaran");
			if($kueri->num_rows() < 1) RETURN "Data Status Pembayaran Kosong...";
			else RETURN $kueri->result();
		 }
		 
		public function tambah_status_pembayaran(){
		$data_status_pembayaran = array('nm_status_pembayaran'=>$this->input->post('Tnm_status_pembayaran',true));
		return (($this->db->insert('tbstatus_pembayaran',$data_status_pembayaran)) ? TRUE : FALSE );
		}
		
		public function edit_status_pembayaran($id){
		$status = array('nm_status_pembayaran'=>$this->input->post('Tnm_status_pembayaran',TRUE));
		return (($this->db->where('id_status_pembayaran',$id)->update('tbstatus_pembayaran',$status)) ? TRUE : FALSE );
		}
		
		public function ambil_status_pembayaran($id){
		$kueri = $this->db->where('id_status_pembayaran',$id)->get('tbstatus_pembayaran');
		if($kueri->num_rows() < 1) RETURN FALSE;
		else RETURN $kueri->row();
		}
		public function hapus_status_pembayaran($id){
			if($this->ambil_status_pembayaran($id)){
			return $this->db->query('delete from tbstatus_pembayaran where id_status_pembayaran='.$id.';');
		}
		else RETURN FALSE;
		}
}
		
