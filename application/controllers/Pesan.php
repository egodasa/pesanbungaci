<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Pesan extends Shallom
{
 function __construct()
 {
	parent::__construct();
	$this->load->library('akses');
	$this->akses->cek_login();
	$this->load->database();
	$this->load->model('Mpesan');
}
 function pesan_produk($banyak){
	$data['jumlah'] = $banyak;
	$data['produk'] = $this->data_combobox($this->db->get('tbtipe_produk')->result(),'id_tipe','nm_tipe','-- Pilih Ukuran Bunga --');
	$data['kota'] = $this->data_combobox($this->db->get('tbkota')->result(),'id_kota','nm_kota','-- Silahkan Pilih Kota Tujuan --');
	$data['jenis_acara'] = $this->data_combobox($this->db->get('tbjenis_acara')->result(),'id_acara','nm_acara','-- Silahkan Pilih Jenis Acara --');
	$data['judul'] = 'Pesan Produk';
	if(!empty($this->input->post('Talamat'))){
	$this->session->set_flashdata('jumlah',$banyak);
	$tipe_produk = $this->input->post('Cproduk');
	$nm_pengirim = $this->input->post('Tnm_pengirim');
	$nm_penerima = $this->input->post('Tnm_penerima');
	$jenis_acara = $this->input->post('Cjenis_acara');
	$kota = $this->input->post('Ckota');
	$tgl_butuh = $this->input->post('Ttgl_kirim');
	$jam_butuh = $this->input->post('Tjam_kirim');
	$alamat = $this->input->post('Talamat');
	$dipesan = array(
	'standar'=>0,
	'jumbo'=>0,
	'double'=>0,
	);
	$hrg_total = 0;
		for($i=0;$i<sizeof($tipe_produk);$i++){
			 $ket_kota = $this->db->where('id_kota',$kota[$i])->get('tbkota')->row();
			 $nm_kota = $ket_kota->nm_kota;
			 $ket_tipe = $this->db->where('id_tipe',$tipe_produk[$i])->get('tbtipe_produk')->row();
			 $nm_tipe = $ket_tipe->nm_tipe;
			 $ket_acara = $this->db->select('nm_acara')->where('id_acara',$jenis_acara[$i])->get('tbjenis_acara')->row();
			 $nm_acara = $ket_acara->nm_acara; 
			 switch($tipe_produk[$i]){
			 case 1 : {
				 $dipesan['standar']++;
				 
				 break;
				}
			 case 2 : {
				 $dipesan['jumbo']++;
				 break;
				}
			 case 3 : {
				 $dipesan['double']++;
				 break;
				}
			 }
			 $hrg_total = $hrg_total + ($ket_kota->hrg_kota + $ket_tipe->hrg_tipe);
		     $data_pesan[$i] = array ('tipe_produk' => $tipe_produk[$i],
										'nm_tipe' => $nm_tipe,
										'hrg_tipe' => $ket_tipe->hrg_tipe,
										'nm_pengirim' => $nm_pengirim[$i],
										'nm_penerima' => $nm_penerima[$i],
										'id_acara' => $jenis_acara[$i],
										'nm_acara' => $nm_acara,
										'nm_kota' => $nm_kota,
										'hrg_kota' => $ket_kota->hrg_kota,
										'id_kota' => $kota[$i],
										'tgl_butuh' => $tgl_butuh[$i],
										'jam_butuh' => $jam_butuh[$i],
										'tgl_kirim' => $this->tgl_mysql($tgl_butuh[$i])." ".$jam_butuh[$i],
										'alamat' => $alamat[$i]);
		}
		$data_transaksi = array(
		'id_pengguna'=>$this->session->id_pengguna,
		'id_pesan'=>"D".$this->kd_transaksi(),
		'id_transaksi'=>$this->kd_transaksi(),	
		'hrg_total'=>$hrg_total,	
		'jumlah'=>$dipesan['standar']+$dipesan['jumbo']+$dipesan['double'],	
		);
		$this->session->set_flashdata('data_transaksi',$data_transaksi);
		$this->session->set_flashdata('data_pesan',$data_pesan);
		$this->session->set_flashdata('dipesan',$dipesan);
		redirect('pesan/detail');
	}
	else
	{
		$this->load->view('/template/2/head',$data);
		$this->load->view('/template/2/style');
		$this->load->view('/template/2/navbar',$data);
		$this->load->view('/template/2/sidebar',$data);
		$this->load->view('pesan-produk-banyak',$data);
		$this->load->view('/template/2/footer');
	}
 }
 
 function detail_pesan(){
	$this->session->keep_flashdata('data_transaksi');
	$this->session->keep_flashdata('data_pesan');
	$this->session->keep_flashdata('dipesan');
	$data['data_transaksi'] = $this->session->flashdata('data_transaksi');
	$data['dipesan'] = $this->session->flashdata('dipesan');
	$data['tersedia'] = $this->cek_stok();
	$data['jumlah'] = $this->session->flashdata('jumlah');
	$data['detail'] = $this->session->flashdata('data_pesan');
	$data['judul'] = 'Detail Pesanan';
	$this->load->view('/template/2/head',$data);
	$this->load->view('/template/2/style');
	$this->load->view('/template/2/navbar',$data);
	$this->load->view('/template/2/sidebar',$data);
	$this->load->view('detail-pesan',$data);
	$this->load->view('/template/2/footer');
 }
 function proses_pesan(){
/*
  * data dari halaman sebelumnya dipanggil dan dimasukkan ke array
  * data array dimasukan ke fungsi model proses_pesan
  */$this->session->keep_flashdata('data_transaksi');
	$this->session->keep_flashdata('data_pesan');
	$this->session->keep_flashdata('dipesan');
	if($this->Mpesan->proses_pesan()){
		if($this->session->nm_jenis != "Admin"){
		$this->session->set_flashdata('pesan',$this->pesan('success','<strong>Info!</strong><br/>Pesanan berhasil diproses. Silahkan lakukan <b>Konfirmasi Pembayaran</b> pada menu <b><a href="'.base_url().'user/transaksi">Daftar Transaksi</a></b>!'));
		}
		else $this->session->set_flashdata('pesan',$this->pesan('success','Pesanan berhasil diproses.!'));

	}
	else $this->session->set_flashdata('pesan',$this->pesan('danger','Telah terjadi kesalahan pada sistem!'));
	redirect('');
 }
 
 function cek_acara(){
 if($this->input->post('Cjenis_acara') == "0"){
	$this->form_validation->set_message('cek_acara','Silahkan pilih jenis acara.'); 
	RETURN FALSE;
 }
 else RETURN TRUE;
 }
 
 function cek_kota(){
 if($this->input->post('Ckota') == "0"){
	$this->form_validation->set_message('cek_kota','Silahkan pilih kota.'); 
	RETURN FALSE;
 }
 else RETURN TRUE;
 }
 function kd_transaksi(){
 $id_transaksi_tmp = $this->db->query('select * from tbtransaksi order by id_transaksi desc')->row();
		$id_transaksi_tmp1=intval(substr($id_transaksi_tmp->id_transaksi,-5));
		$id_transaksi_tmp1++;
		if($id_transaksi_tmp1){
			if($id_transaksi_tmp1 <= 9) {
				$id_transaksi = "PS0000".$id_transaksi_tmp1;
			}
			else if($id_transaksi_tmp1 <= 99){
				$id_transaksi = "PS000".$id_transaksi_tmp1;
				}
			else if($id_transaksi_tmp1 <= 999){
				$id_transaksi = "PS00".$id_transaksi_tmp1;
				}
			else if($id_transaksi_tmp1 <= 9999){
				$id_transaksi = "PS0".$id_transaksi_tmp1;
				}
			else if($id_transaksi_tmp1 <= 99999){
				$id_transaksi = "PS".$id_transaksi_tmp1;
				}
			else $id_transaksi = "0000".$id_transaksi_tmp1;
		}
		else $id_transaksi = "PS00001";
	return $id_transaksi;
 }
 function cek_stok(){
	$standar = $this->db->query('select count(id_tipe) as "st" from tbproduk where id_tipe=1 and id_status_produk=1;')->row();
	$double = $this->db->query('select count(id_tipe) as "db" from tbproduk where id_tipe=2 and id_status_produk=1;')->row();
	$jumbo = $this->db->query('select count(id_tipe) as "jm" from tbproduk where id_tipe=3 and id_status_produk=1;')->row();
	$list_stok = array(
	'standar'=>$standar->st,
	'jumbo'=>$double->db,
	'double'=>$jumbo->jm,
	);
	RETURN $list_stok;
	}
}
