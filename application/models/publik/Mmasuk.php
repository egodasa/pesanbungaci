<?php
class Mmasuk extends CI_Model {
public $primary_key = 'id_user';
public function __construct()
{
    parent::__construct();
}
function info_pengguna($username)
{
	$this->db->limit(1);
	$query = $this->db->query('select * from tbpengguna,tbjenis_pengguna where tbpengguna.id_jenis=tbjenis_pengguna.id_jenis and tbpengguna.username="'.$username.'" limit 1;');
	return ($query->num_rows() > 0) ? $query->row() : FALSE;
}
}
