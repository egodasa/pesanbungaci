<?php
class Mberanda extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
       
public function daftar_produk()
		{
			$kueri = $this->db->query('select * from tbproduk,tbtipe_produk where tbproduk.id_tipe=tbtipe_produk.id_tipe and tbproduk.id_status_produk=1 order by tbproduk.id_produk asc;');
			if($kueri->num_rows() < 1) RETURN "Stok Karangan Bunga Sedang Kosong..."; 
			else RETURN $kueri->result();
		}
public function pesan_acak($id_tipe){
	$kueri = $this->db->query('select id_produk from tbproduk where id_tipe='.$id_tipe.' and id_status_produk <> 2 limit 1;')->row();
	if($kueri) return $kueri->id_produk;
	else return null;
}
public function hitung_stok(){
	$standar = $this->db->query('select count(id_tipe) as "st" from tbproduk where id_tipe=1 and id_status_produk=1;')->row();
	$double = $this->db->query('select count(id_tipe) as "db" from tbproduk where id_tipe=2 and id_status_produk=1;')->row();
	$jumbo = $this->db->query('select count(id_tipe) as "jm" from tbproduk where id_tipe=3 and id_status_produk=1;')->row();
	RETURN "Standar ".$standar->st.", Jumbo ".$double->db.", Double ".$jumbo->jm;
	}
}
