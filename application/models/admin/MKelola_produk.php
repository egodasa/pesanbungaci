<?php
class MKelola_produk extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
		public function laporan_produk()
        {
			$kueri = $this->db->query("select * from tbproduk,tbtipe_produk,tbstatus_produk where tbproduk.id_status_produk=tbstatus_produk.id_status_produk and tbproduk.id_tipe=tbtipe_produk.id_tipe order by tbproduk.id_produk asc;");
			$no=1;
			if($kueri->num_rows() < 1) RETURN "Data Produk Kosong";
			else RETURN $kueri->result(); 
		 }
		 
		public function tambah_produk(){
		$id_produk_tmp = $this->db->query('select * from tbproduk order by id_produk desc')->row();
		if($id_produk_tmp){
			if(substr($id_produk_tmp->id_produk,-4) < 9) {
				$id_produk1 = substr($id_produk_tmp->id_produk,-1)+1;
				$id_produk = "P000".$id_produk1;
			}
			else if(substr($id_produk_tmp->id_produk,-4) < 99){
				$id_produk1 = substr($id_produk_tmp->id_produk,-2)+1;
				$id_produk = "P00".$id_produk1;
				}
			else if(substr($id_produk_tmp->id_produk,-4) < 999){
				$id_produk1 = substr($id_produk_tmp->id_produk,-3)+1;
				$id_produk = "P0".$id_produk1;
				}
			else if(substr($id_produk_tmp->id_produk,-4) < 9999){
				$id_produk1 = substr($id_produk_tmp->id_produk,-4)+1;
				$id_produk = "P".$id_produk1;
				}
			else $id_produk = "0000";
		}
		else $id_produk = "P0001";
		$upload = $this->upload();
		$data_produk = array(
			'id_produk'=>$id_produk,
			'id_tipe'=>$this->input->post('Ctipe',true),
			'gambar'=>$upload['file_name']
			);
		return (($this->db->insert('tbproduk',$data_produk)) ? TRUE : FALSE );
		}
		
		public function edit_produk($id){
		$upload = $this->upload();
		$id = $this->input->post('Tid_produk',TRUE);
		$edit_produk = array(
		'id_tipe'=>$this->input->post('Ctipe',TRUE),
		'gambar'=>$upload['file_name']
		);
		return (($this->db->where('id_produk',$id)->update('tbproduk',$edit_produk)) ? TRUE : FALSE );
		}
		
		public function ambil_produk()
		{
			return $this->db->query("select * from tbproduk,tbtipe_produk where tbproduk.id_tipe=tbtipe_produk.id_tipe;")->result();
			}
		public function detail_produk($id)
		{
			$kueri = $this->db->query("select * from tbproduk,tbtipe_produk where tbproduk.id_tipe=tbtipe_produk.id_tipe and tbproduk.id_produk='".$id."';");
			if($kueri->num_rows() < 1) RETURN FALSE;
			else RETURN $kueri->row();
		}
		public function hapus_produk($id_produk){
			if($this->detail_produk($id_produk)){
			return $this->db->query("delete from tbproduk where id_produk='".$id_produk."';");
			}
			else RETURN FALSE;
		
		}
		public function upload()
		{
		return $this->upload->data();	
		}
}
		
