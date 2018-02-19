<?php
class Mtarif_pengiriman extends CI_Model {
public function __construct()
{
parent::__construct();
}

public function tarif_pengiriman()
{
	$kueri = $this->db->query('select * from tbkota;');
	if($kueri->num_rows() < 1) RETURN "Data Tarif sedang kosong..."; 
	else RETURN $kueri->result();
}
}
