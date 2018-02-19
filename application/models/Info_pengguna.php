<?php if (!defined('BASEPATH')) exit('No direct script access
allowed');

 class Info_pengguna extends CI_Model
 {

 public $table = 'tbpengguna';
 public $primary_key = 'id_user';

 function __construct()
 {
 parent::__construct();
 }

 function get_login_info($username)
 {
 $this->db->where('username', $username);
 $this->db->limit(1);
 $query = $this->db->get($this->table);
 return ($query->num_rows() > 0) ? $query->row() : FALSE;
}

 }
