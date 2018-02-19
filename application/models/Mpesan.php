<?php
class Mpesan extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
		public function ambil_produk($id_produk)
		{
			$kueri = $this->db->query("select * from tbproduk,tbtipe_produk where tbproduk.id_tipe=tbtipe_produk.id_tipe and tbproduk.id_produk='".$id_produk."';");
			if($kueri->num_rows() >0)
			{
				foreach ($kueri->result_array() as $isi) RETURN $isi;
			}
				else
				{
				$hasil['id_produk']='0';
				$hasil['id_tipe']='0';
				$hasil['nm_tipe']='0';
				$hasil['deskripsi']='0';
				RETURN $hasil;
				}
			}
		
		public function ket_acara($id_acara){
			RETURN $this->db->where('id_acara',$id_acara)->get('tbjenis_acara')->row();
		}
		
		public function ket_kota($id_kota){
			RETURN $this->db->where('id_kota',$id_kota)->get('tbkota')->row();
		}
		public function proses_pesan(){
		$transaksi = $this->session->flashdata('data_transaksi');
		$pesan = $this->session->flashdata('data_pesan');
		$dipesan = $this->session->flashdata('dipesan');
		$i=0;
		foreach($pesan as $tpesan){
			$pilih_produk = $this->db->query('select id_produk from tbproduk where id_tipe="'.$tpesan['tipe_produk'].'"and id_status_produk=1 limit 1;')->row();
			if(!$pilih_produk) {
				$this->session->set_flashdata('pesan','Stok Produk Tidak Mencukupi');
				redirect('');
			}
			$id_produk = $pilih_produk->id_produk;
			$this->db->set('id_status_produk',2)->where('id_produk',$id_produk)->update('tbproduk');
			$data_pesan_detail[$i] = array(
			'id_pesan'=>$transaksi['id_pesan'],
			'id_produk'=>$id_produk,
			'nm_pengirim'=>$tpesan['nm_pengirim'],
			'nm_penerima'=>$tpesan['nm_penerima'],
			'tgl_kirim'=>$tpesan['tgl_kirim'],
			'id_kota'=>$tpesan['id_kota'],
			'id_acara'=>$tpesan['id_acara'],
			'alamat'=>$tpesan['alamat']
			);
			$i++;
		}
		if($this->db->insert_batch('tbpesan_detail',$data_pesan_detail)) {
			if($this->session->nm_jenis == "Admin"){
			$transaksi['id_status_pembayaran'] = 3;
 			$transaksi['id_status_transaksi'] = 2;
			}
			if($this->db->insert('tbtransaksi',$transaksi)) RETURN TRUE;
			else RETURN FALSE;
		}
		else RETURN FALSE;
}
}
		
