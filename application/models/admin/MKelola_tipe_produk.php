<?php
class MKelola_tipe_produk extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
		public function laporan_tipe_produk()
        {
			$kueri = $this->db->get("tbtipe_produk");
			if($kueri->num_rows() < 1) RETURN "Data Tipe Produk Kosong....";
			else RETURN $kueri->result();
		 }
		 
		public function tambah_tipe_produk(){
		$data_tipe = array('nm_tipe'=>$this->input->post('Tnm_tipe',true),'hrg_tipe'=>$this->input->post('Thrg_tipe',TRUE));
		return (($this->db->insert('tbtipe_produk',$data_tipe)) ? TRUE : FALSE );
		}
		
		public function edit_tipe_produk($id){
		$tipe = array(
		'nm_tipe' => $this->input->post('Tnm_tipe',TRUE),
		'hrg_tipe' => $this->input->post('Thrg_tipe',TRUE));
		return (($this->db->where('id_tipe',$id)->update('tbtipe_produk',$tipe)) ? TRUE : FALSE );
		}
		
		public function ambil_tipe_produk($id){
		$kueri = $this->db->where('id_tipe',$id)->get('tbtipe_produk');
		if($kueri->num_rows() < 1) RETURN FALSE;
		else RETURN $kueri->row();
		}
		public function tipe_produk()
		{
			$kueri = $this->db->select('id_tipe,nm_tipe')->get('tbtipe_produk');
			$hasil['0']='-- Pilih tipe produk --';
			if($kueri->num_rows() <=0){
				$hasil['Kosong']='Data Tiper Produk tidak ada';
				}
			else{
			foreach ($kueri->result() as $isi)
			{
				$hasil[$isi->id_tipe]=$isi->nm_tipe;
			}
		}
			RETURN $hasil;
		}
		public function hapus_tipe_produk($id){
			if($this->ambil_tipe_produk($id)){
			return $this->db->query('delete from tbtipe_produk where id_tipe='.$id.';');
			}
			else RETURN FALSE;
		}
}
		
