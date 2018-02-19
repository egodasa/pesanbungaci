<?php
class Mpengaturan extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
/*
public function pengaturan(){
	$navbar = $this->db->where('nm_pengaturan','navbar')->get('tbpengaturan')->row_array();
	$sidebar = $this->db->where('nm_pengaturan','sidebar_head')->get('tbpengaturan')->row_array();
	$menu_aktif = $this->db->where('nm_pengaturan','menu_aktif')->get('tbpengaturan')->row_array();
	$footer = $this->db->where('nm_pengaturan','footer')->get('tbpengaturan')->row_array();
	$logo = $this->db->where('nm_pengaturan','logo')->get('tbpengaturan')->row_array();
	$hasil['navbar'] = $navbar['nilai_pengaturan'];
	$hasil['sidebar'] = $sidebar['nilai_pengaturan'];
	$hasil['menu_aktif'] = $menu_aktif['nilai_pengaturan'];
	$hasil['footer'] = $footer['nilai_pengaturan'];
	$hasil['logo'] = $logo['nilai_pengaturan'];
	return $hasil;
}
public function simpan_pengaturan(){
	$upload = $this->upload();
	$navbar = $this->input->post('Tnavbar');
	$menu_aktif = $this->input->post('Tmenu_aktif');
	$sidebar = $this->input->post('Tsidebar');
	$footer = $this->input->post('Tfooter');
	$logo = $upload['file_name'];
	$this->db->set('nilai_pengaturan',$navbar)->where('nm_pengaturan','navbar')->update('tbpengaturan');
	$this->db->set('nilai_pengaturan',$menu_aktif)->where('nm_pengaturan','menu_aktif')->update('tbpengaturan');
	$this->db->set('nilai_pengaturan',$sidebar)->where('nm_pengaturan','sidebar_head')->update('tbpengaturan');
	$this->db->set('nilai_pengaturan',$footer)->where('nm_pengaturan','footer')->update('tbpengaturan');
	$this->db->set('nilai_pengaturan',$logo)->where('nm_pengaturan','logo')->update('tbpengaturan');
}
public function upload()
	{
	return $this->upload->data();	
	}
*/
}
		

