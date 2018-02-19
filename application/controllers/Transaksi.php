<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Transaksi extends Shallom
{
	public $id_transaksi;
 function __construct()
 {
	parent::__construct();
	$this->akses->cek_login();
	$this->load->database();
	$this->load->model('Mtransaksi');
	$this->id_transaksi = $this->input->get('id_transaksi');
}
 public function laporan_transaksi()
 {
	 $data['judul'] = 'Daftar Transaksi';
	 $data['transaksi'] = $this->Mtransaksi->daftar_transaksi();
	 $this->load->view('/template/2/head',$data);
	 $this->load->view('/template/2/style');
	 $this->load->view('/template/2/navbar',$data);
	 $this->load->view('/template/2/sidebar',$data);
	 $this->load->view('laporan-transaksi',$data);
	 $this->load->view('/template/2/footer');
 }
 function detail_transaksi(){
	 $data['detail'] = $this->Mtransaksi->detail_transaksi($this->id_transaksi);
	 $data['detail_pesan'] = $this->Mtransaksi->detail_pesan($data['detail']->id_pesan);
	 if($data['detail']){
	 $data['judul'] = 'Detail Transaksi';
	 $this->load->view('/template/2/head',$data);
	 $this->load->view('/template/2/style');
	 $this->load->view('/template/2/navbar',$data);
	 $this->load->view('/template/2/sidebar',$data);
	 $this->load->view('detail-transaksi',$data);
	 $this->load->view('/template/2/footer');
	}
	else{
	$this->session->set_flashdata('pesan',$this->pesan('warning','Data Transaksi yang Anda minta tidak ditemukan.'));
	redirect('user/transaksi');
	}
}
 function konfirmasi_transaksi(){
     $data['detail'] = $this->Mtransaksi->detail_transaksi($this->id_transaksi);
		if($data['detail'] && ($data['detail']->id_pengguna == $this->session->id_pengguna || $this->session->nm_jenis == "Admin" || $data['detail']->id_status_transaksi != 2)){ 
			if($this->form_validation->run('konfirmasi_transaksi')){
				$this->konsol('form validasi betul');
				if($this->Mtransaksi->konfirmasi_transaksi() == TRUE){
					$this->konsol('db betul');
					$this->session->set_flashdata('pesan',$this->pesan('success','Transaksi Berhasil Dikonfirmasi. Kami akan melakukan validasi terhadap konfirmasi Anda.'));
				}
				else{
					$this->konsol('db salah');
					$this->session->set_flashdata('pesan',$this->pesan('warning','Transaksi Gagal Dikonfirmasi. Silahkan ulangi kembali.'));
				}
				redirect('user/transaksi');
			}
			else
			{
				if(empty(form_error('Tnm_pembayar'))) {
				$this->konsol('form validasi Tnm_pembayar kosong');
				$this->session->set_flashdata('Tnm_pembayar','');
				}
				else{
					$this->konsol(form_error('Tnm_pembayar'));
					$this->session->set_flashdata('Tnm_pembayar','has-error');
				}
				
				if(empty(form_error('Tno_rekening'))) {
				$this->konsol('form validasi Tno_rek kosong');
				$this->session->set_flashdata('Tno_rekening','');
				}
				else{
					$this->konsol(form_error('Tno_rekening'));
					$this->session->set_flashdata('Tno_rekening','has-error');
				}
				
				if(empty(form_error('Ubukti'))){
					$this->konsol('form validasi Ubukti kosong');
					$this->session->set_flashdata('Ubukti','');
				}
				else{
				$this->konsol($this->upload->display_errors());
				$this->session->set_flashdata('Ubukti','has-error');
				$this->session->set_flashdata('Ubukti_err',$this->upload->display_errors());
				}
		 $data['judul'] = 'Konfirmasi Transaksi';
		 $this->load->view('/template/2/head',$data);
		 $this->load->view('/template/2/style');
		 $this->load->view('/template/2/navbar',$data);
		 $this->load->view('/template/2/sidebar',$data);
		 $this->load->view('konfirmasi-transaksi',$data);
		 $this->load->view('/template/2/footer');
		}
		}
		else {
		$this->session->set_flashdata('pesan',$this->pesan('danger','Halaman Yang Anda Minta tidak ditemukan...'));
		redirect('user/transaksi');
		}
}
	function validasi_pembayaran($status){
		if($this->Mtransaksi->validasi_pembayaran($status,$this->input->get('id_transaksi'))){
			$this->session->set_flashdata('pesan',$this->pesan('success','Transaksi berhasil divalidasi...'));
			redirect('user/transaksi');
		}	
		else{
			$this->session->set_flashdata('pesan',$this->pesan('success','Pembayaran transaksi yang dipilih telah ditolak...'));
			redirect('user/transaksi');
		}	
	}
	function pembayaran(){
	 $this->akses->cek_akses('Admin');
	 $data['detail'] = $this->Mtransaksi->cek_pembayaran($this->input->get('id_transaksi'))->row();
	 if($data['detail']){
	 $data['judul'] = 'Validasi Transaksi';
	 $this->load->view('/template/2/head',$data);
	 $this->load->view('/template/2/style');
	 $this->load->view('/template/2/navbar',$data);
	 $this->load->view('/template/2/sidebar',$data);
	 $this->load->view('validasi-transaksi',$data);
	 $this->load->view('/template/2/footer');
	}
	else{
	$this->session->set_flashdata('pesan',$this->pesan('warning','Data Pembayaran Transaksi yang Anda minta tidak ditemukan...'));
	redirect('user/transaksi');
	}
	}
 function batal_transaksi(){
 $cek_transaksi = $this->db->where('id_transaksi',$this->input->get('id_transaksi'))->get('tbtransaksi')->row();
 if($cek_transaksi->id_pengguna == $this->session->id_pengguna || $this->session->nm_jenis == "Admin"){
	$transaksi = $this->Mtransaksi->batal_transaksi($this->input->get('id_transaksi'));
	if($transaksi) {
		$this->session->set_flashdata('pesan',$this->pesan('success','Transaksi Berhasil dibatalkan.'));
		redirect('user/transaksi');
	}
	else{
		$this->session->set_flashdata('pesan',$this->pesan('danger','Telah terjadi kesalahan pada sistem Kami.'));
		redirect('user/transaksi');
	}
 }
 else
 {
	$this->session->set_flashdata('pesan',$this->pesan('danger','Halaman yang Anda minta tidak ditemukan...'));
	redirect('');
 }
 }
 function cetak_bon(){
	 $data['detail'] = $this->Mtransaksi->detail_transaksi($this->input->get('id_transaksi'));
	 $data['tanggal'] = $this->tanggal_now();
	 if($data['detail']->id_pengguna == $this->session->id_pengguna || $this->session->nm_jenis == "Admin" || $data['detail']->id_status_transaksi == 1){
	 $data['detail_pesan'] = $this->Mtransaksi->detail_pesan($data['detail']->id_pesan);
	 $data['judul'] = 'Detail Transaksi';
	 $this->load->view('/template/2/head',$data);
	 $this->load->view('/template/2/style');
	 $this->load->view('cetak-bon',$data);
	}
	else{
	$this->session->set_flashdata('pesan',$this->pesan('warning','Data Transaksi yang Anda minta tidak ditemukan.'));
	redirect('user/transaksi');
	}
 }
 function validasi_upload(){
	$config['upload_path']          = './pembayaran';
	$config['allowed_types']        = 'jpg';
	$config['max_size']             = 5012;
	$config['max_width']            = 5000;
	$config['max_height']           = 5000;
	$config['min_width']            = 420;
	$config['min_height']           = 200;
	$this->load->library('upload', $config);
	RETURN $this->upload->do_upload('Ubukti');
 }
}
