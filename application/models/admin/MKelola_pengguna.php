<?php
class MKelola_pengguna extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
		public function laporan_pengguna($filter = '')
        {
			if(empty($this->input->get('cari')) && empty($this->input->get('filter'))){
			switch($filter){
				case 'username_asc' : {
					$urutkan = "order by tbpengguna.username asc";
					break;
					}
				case 'username_desc' : {
					$urutkan = "order by tbpengguna.username desc";
					break;
					}
				
				case 'nama_asc' : {
					$urutkan = "order by tbpengguna.nm_pengguna asc";
					break;
					}
				
				case 'nama_desc' : {
					$urutkan = "order by tbpengguna.nm_pengguna desc";
					break;
					}
				default : $urutkan = "";
				}
				$kueri = $this->db->query("select * from tbpengguna,tbjenis_pengguna where tbpengguna.id_jenis=tbjenis_pengguna.id_jenis $urutkan;");
				if($kueri->num_rows() < 1) RETURN "Data Kota Kosong...";
				else RETURN $kueri->result();
			}
			else {
			$kueri = $this->db->query("select * from tbpengguna,tbjenis_pengguna where tbpengguna.id_jenis=tbjenis_pengguna.id_jenis and tbpengguna.".$this->input->get('filter')." like '%".$this->input->get('cari')."%';");
			if($kueri->num_rows() < 1) RETURN "<p class='text-center'>Tidak Ditemukan Hasil Pencarian <b>".$this->input->get('cari')."</b>.</p>";
			else RETURN $kueri->result();
			}
		}
		public function tambah_pengguna(){
		$data_user = array('username'=>$this->input->post('Tusername',true),
		'nm_pengguna'=>$this->input->post('Tnm_pengguna',true),
		'password'=>md5($this->input->post('Tsandi1',true)),
		'email'=>$this->input->post('Temail',true),
		'nohp'=>$this->input->post('Tnohp',true),
		'id_jenis'=>$this->input->post('Cjenis',true)
		);
		if($this->db->insert('tbpengguna',$data_user)){
		echo "<script>console.log('tambah pengguna ok');</script>";
		return TRUE;
		}
		else{
			echo "<script>console.log('tambah pengguna error');</script>";
			return FALSE;
		}
		}
		
		public function edit_pengguna($id){
		$pengguna = array(
		'email'=> $this->input->post('Temail',TRUE),
		'nohp' => $this->input->post('Tnohp',TRUE),
		'nm_pengguna' => $this->input->post('Tnm_pengguna',TRUE),
		'id_jenis' => $this->input->post('Cjenis',TRUE)
		);
		if($this->db->where('id_pengguna',$id)->update('tbpengguna',$pengguna)){
		echo "<script>console.log('edit pengguna ok');</script>";
		return true;
		}
		else{
		echo "<script>console.log('edit pengguna error');</script>";
		return false;
		}
		}
		
		public function ambil_pengguna($id){
			$kueri = $this->db->where('id_pengguna',$id)->get('tbpengguna');
			if($kueri->num_rows() < 1) RETURN FALSE;
			else RETURN $kueri->row();
		}
		public function hapus_pengguna($id){
			if($this->ambil_pengguna($id)){
			RETURN $this->db->query('delete from tbpengguna where id_pengguna='.$id.';');
			}
			else RETURN FALSE;
		}
}
		
