<?php
class Mtransaksi extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }
public function laporan_transaksi($id_pengguna,$filter)
        {
			switch($filter){
			case 'tgl_pesan_asc' : {
				$urutkan = "order by tbtransaksi.tgl_pesan desc";
				break;
				}
			case 'status_transaksi_nonaktif' : {
				$urutkan = "and tbtransaksi.id_status_transaksi=1";
				break;
				}
			case 'status_transaksi_aktif' : {
				$urutkan = "and tbtransaksi.id_status_transaksi=2";
				break;
				}
			case 'status_transaksi_batal' : {
				$urutkan = "and tbtransaksi.id_status_transaksi=3";
				break;
				}
			case 'status_transaksi_batal' : {
				$urutkan = "and tbtransaksi.id_status_transaksi=3";
				break;
				}
			case 'status_bayar_diproses' : {
				$urutkan = "and tbtransaksi.id_status_pembayaran=1";
				break;
				}
			case 'status_bayar_diterima' : {
				$urutkan = "and tbtransaksi.id_status_pembayaran=3";
				break;
				}
			case 'status_bayar_ditolak' : {
				$urutkan = "and tbtransaksi.id_status_pembayaran=2";
				break;
				}
			case 'status_bayar_belum_bayar' : {
				$urutkan = "and tbtransaksi.id_status_pembayaran=4";
				break;
				}
			default : $urutkan = " order by tbtransaksi.tgl_pesan desc";
			}
			if($this->session->nm_jenis == "Admin"){
			$kueri = 'select * from tbpengguna,tbstatus_pembayaran,tbtransaksi,tbstatus_transaksi where tbtransaksi.id_pengguna=tbpengguna.id_pengguna and tbtransaksi.id_status_pembayaran=tbstatus_pembayaran.id_status_pembayaran and tbtransaksi.id_status_transaksi=tbstatus_transaksi.id_status_transaksi '.$urutkan;
			}
			else{
			$kueri = 'select * from tbpengguna,tbstatus_pembayaran,tbtransaksi,tbstatus_transaksi where tbtransaksi.id_pengguna=tbpengguna.id_pengguna and tbtransaksi.id_status_pembayaran=tbstatus_pembayaran.id_status_pembayaran and tbtransaksi.id_status_transaksi=tbstatus_transaksi.id_status_transaksi and tbtransaksi.id_pengguna='.$id_pengguna.' '.$urutkan.';';
			}
			
			RETURN $this->db->query($kueri);
		}
public function detail_transaksi($id_transaksi){
		if($this->session->nm_jenis == "Admin"){
		$kueri = 'select * from tbstatus_pembayaran,tbtransaksi,tbstatus_transaksi,tbpesan_detail,tbpengguna where tbtransaksi.id_pengguna=tbpengguna.id_pengguna and tbtransaksi.id_pesan=tbpesan_detail.id_pesan and tbtransaksi.id_status_pembayaran=tbstatus_pembayaran.id_status_pembayaran and tbtransaksi.id_status_transaksi=tbstatus_transaksi.id_status_transaksi and tbtransaksi.id_transaksi="'.$id_transaksi.'" limit 1;';
		}
		else {
		$kueri = 'select * from tbstatus_pembayaran,tbtransaksi,tbstatus_transaksi,tbpesan_detail,tbpengguna where tbtransaksi.id_pengguna=tbpengguna.id_pengguna and tbtransaksi.id_pesan=tbpesan_detail.id_pesan and tbtransaksi.id_status_pembayaran=tbstatus_pembayaran.id_status_pembayaran and tbtransaksi.id_status_transaksi=tbstatus_transaksi.id_status_transaksi and tbtransaksi.id_transaksi="'.$id_transaksi.'" and tbtransaksi.id_pengguna='.$this->session->id_pengguna.' limit 1;';
		}
		if($this->db->query($kueri)->num_rows() < 1) RETURN FALSE;
		else RETURN $this->db->query($kueri)->row();
}
public function konfirmasi_transaksi(){
		$kon = array(
		'id_bayar'=>"B".$this->input->get('id_transaksi'),
		'id_transaksi'=>$this->input->post('Tid_transaksi'),
		'nm_pembayar'=>$this->input->post('Tnm_pembayar'),
		'no_rek'=>$this->input->post('Tno_rekening'),
		'bukti'=>$this->upload->data('file_name')
		);
		$kueri = $this->db->where('id_transaksi',$this->input->post('Tid_transaksi'))->get('tbpembayaran')->num_rows();
		if($kueri < 1){
			$kueri = $this->db->insert('tbpembayaran',$kon);
			if($kueri){
				if($this->db->set('id_status_pembayaran',1)->where('id_transaksi',$this->input->get('id_transaksi'))->update('tbtransaksi')) RETURN TRUE;
				else RETURN FALSE;
			}
			else RETURN FALSE;
		}
		else {
			$kueri = $this->db->where('id_transaksi',$this->input->post('Tid_transaksi'))->
			set('nm_pembayar',$this->input->post('Tnm_pembayar'))->
			set('no_rek',$this->input->post('Tno_rekening'))->
			set('bukti',$this->upload->data('file_name'))->
			update('tbpembayaran');
			if($kueri){
				if($this->db->set('id_status_pembayaran',1)->where('id_transaksi',$this->input->get('id_transaksi'))->update('tbtransaksi')) RETURN TRUE;
				else RETURN FALSE;
			}
			else RETURN FALSE;
		}
		}
public function detail_pembayaran($id_transaksi){
		$kueri = $this->db->get('tbpembayaran');
		RETURN $kueri;
		}
public function cek_pembayaran($id_transaksi){
		$kueri = 'select * from tbpembayaran,tbstatus_pembayaran,tbtransaksi where tbtransaksi.id_status_pembayaran=tbstatus_pembayaran.id_status_pembayaran and tbpembayaran.id_transaksi=tbtransaksi.id_transaksi and tbtransaksi.id_transaksi="'.$id_transaksi.'";';
		RETURN $this->db->query($kueri);
		}
public function validasi_pembayaran($status,$id_transaksi){
			switch($status){
			case 2 :{
				if($this->db->set('id_status_pembayaran',3)->set('id_status_transaksi',2)->where('id_transaksi',$id_transaksi)->update('tbtransaksi')) RETURN TRUE;
				else RETURN FALSE;
				break;
				}
			case 3 :{
				if($this->db->set('id_status_pembayaran',2)->where('id_transaksi',$id_transaksi)->update('tbtransaksi')) RETURN TRUE;
				else RETURN FALSE;
				break;
				}
			default :{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Halaman yang Anda minta tidak ditemukan!</div>');
				break;
				}
			}
		}
public function daftar_transaksi(){
		if($this->laporan_transaksi($this->session->id_pengguna,$this->input->get('urutkan'))->result()){
		$no=1;
		foreach($this->laporan_transaksi($this->session->id_pengguna,$this->input->get('urutkan'))->result() as $i){
		$id_trk = $i->id_transaksi;
		if($this->session->nm_jenis == 'Admin'){
		if($i->id_status_transaksi==1){
			$status_panel="panel-warning";
			switch($i->id_status_pembayaran){
			case 1 : {
				$aksi = $this->tombol('detail',$id_trk).$this->tombol('validasi',$id_trk).$this->tombol('batalkan',$id_trk);
				break;
				}
			case 2 : 
			case 3 : {
				$aksi = $this->tombol('detail',$id_trk);
				break;
				}
			default : {
				$aksi = $this->tombol('detail',$id_trk).$this->tombol('batalkan',$id_trk);
				break;
				}
			}
		}
		else if($i->id_status_transaksi==2){
		$status_panel="panel-success";
		$aksi = $this->tombol('detail',$id_trk).$this->tombol('cetak',$id_trk);
		}
		else {
		$status_panel="panel-danger";
		$aksi = $this->tombol('detail',$id_trk);
		}
	}
	else{
	if($i->id_status_transaksi==1){
		$status_panel="panel-warning";
		switch($i->id_status_pembayaran){
			case 1 : {
				$aksi = $this->tombol('detail',$id_trk).$this->tombol('batalkan',$id_trk);
				break;
				}
			case 2 : {
				$aksi = $this->tombol('detail',$id_trk).$this->tombol('konfirmasi',$id_trk);
				break;
				}
			case 3 : {
				$aksi = $this->tombol('detail',$id_trk);
				break;
				}
			default : {
				$aksi = $this->tombol('detail',$id_trk).$this->tombol('konfirmasi',$id_trk).$this->tombol('batalkan',$id_trk);
				break;
				}
			}
		}
		else if($i->id_status_transaksi==2){
		$status_panel="panel-success";
		$aksi = $this->tombol('detail',$id_trk).$this->tombol('cetak',$id_trk);
		}
		else {
		$status_panel="panel-danger";
		$aksi = $this->tombol('detail',$id_trk);
		}
		}
		$list_transaksi[]="
		<div class='panel {$status_panel}'>
		<div class='panel-body'>
		<div class='form-group'>
		<label class='control-label col-sm-3' for='Tnm_pengirim'>Kode Transaksi  </label>
		<div class='col-sm-3'><p class='form-control-static' id='Tnm_pengirim'>{$i->id_transaksi}</p></div>
		
		<label class='control-label col-sm-3' for='Tnm_pengirim'>Total Biaya  </label>
		<div class='col-sm-3'><p class='form-control-static' id='Tnm_pengirim'>Rp".number_format($i->hrg_total,2,',','.')."</p></div>
		
		<label class='control-label col-sm-3' for='Tnm_pengirim'>Status Pembayaran  </label>
		<div class='col-sm-3'><p class='form-control-static' id='Tnm_pengirim'>$i->nm_status_pembayaran</p></div>
		
		<label class='control-label col-sm-3' for='Tnm_pengirim'>Tanggal Pesan  </label>
		<div class='col-sm-3'><p class='form-control-static' id='Tnm_pengirim'>{$i->tgl_pesan}</p></div>
		
		<label class='control-label col-sm-3' for='Tnm_pengirim'>Status Transaksi  </label>
		<div class='col-sm-3'><p class='form-control-static' id='Tnm_pengirim'>{$i->nm_status_transaksi}</p></div>
		
		<div class='col-sm-6'>$aksi</div>
		</div>
		</div>
		</div>
		";
		
		$no++;
		}
		}
		else $list_transaksi[]="<p class='text-center'>Data Transaksi kosong....</p>";
		RETURN $list_transaksi;
}
public function batal_transaksi($id_transaksi){
	$id_pesan = $this->db->select('id_pesan')->where('id_transaksi',$id_transaksi)->get('tbtransaksi')->row()->id_pesan;
	$pesan_detail = $this->db->where('id_pesan',$id_pesan)->get('tbpesan_detail')->result();
	if($pesan_detail){
		foreach($pesan_detail as $pesan){
			if(!$this->db->set('id_status_produk',1)->where('id_produk',$pesan->id_produk)->update('tbproduk')) RETURN FALSE;
		}
	}
	else RETURN FALSE;
	if($this->db->set('id_status_transaksi',3)->where('id_transaksi',$id_transaksi)->update('tbtransaksi')) RETURN TRUE;
	else RETURN FALSE;
	}
public function detail_pesan($id_pesan){
	$kueri = $this->db->query('select * from tbpesan_detail,tbproduk,tbtipe_produk,tbkota,tbjenis_acara where tbpesan_detail.id_produk=tbproduk.id_produk and tbproduk.id_tipe=tbtipe_produk.id_tipe and tbpesan_detail.id_kota=tbkota.id_kota and tbpesan_detail.id_acara=tbjenis_acara.id_acara and tbpesan_detail.id_pesan="'.$id_pesan.'";');
	if($kueri->num_rows() < 1){
	$this->session->set_flashdata('pesan','<div class="alert alert-warning">Data Pemesanan tidak ditemukan!</div>');
	redirect('user/transaksi');
	}
	else RETURN $kueri->result();
}
public function tombol($tombol,$url){
	switch($tombol){
	case 'detail': {
		return "<a href='".base_url()."user/transaksi/detail?id_transaksi=".$url."' class='btn btn-info'><span class='glyphicon glyphicon-list'></span> Lihat Detail</a>";
		break;
		}
	case 'batalkan' : {
		return "<a href='".base_url()."user/transaksi/batal?id_transaksi=".$url."' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span> Batalkan Transaksi</a>";
		break;
		}
	case 'validasi' : {
		return "<a href='".base_url()."user/transaksi/validasi?id_transaksi=".$url."' class='btn btn-success'><span class='glyphicon glyphicon-check'></span> Validasi Pembayaran</a>";
		break;
		}
	case 'konfirmasi' : {
		return "<a href='".base_url()."user/transaksi/konfirmasi?id_transaksi=".$url."' class='btn btn-success'><span class='glyphicon glyphicon-check'></span> Konfirmasi Pembayaran</a>";
		break;
		}
	case 'cetak' : {
		return "<a target='_NEW' href='".base_url()."user/transaksi/cetak-bukti?id_transaksi=".$url."' class='btn btn-primary'><span class='glyphicon glyphicon-print'></span> Cetak Bon</a>";
		break;
		}
	}
}
function tanggal_indo($hari,$bulan,$tahun){
	 $hari_tmp = date("l", mktime(0, 0, 0, $bulan, $hari, $tahun));
	 $bulan_tmp = date("F", mktime(0, 0, 0, $bulan, $hari, $tahun));
	 $tahun_tmp = date("Y", mktime(0, 0, 0, $bulan, $hari, $tahun));
	 switch($hari_tmp){
		 case "Monday" : {
			$ket_hari = "Senin";
			break;
			}
		 case "Sunday" : {
			$ket_hari = "Minggu";
			break;
			}
		 case "Tuesday" : {
			$ket_hari = "Selasa";
			break;
			}
		 case "Wednesday" : {
			$ket_hari = "Rabu";
			break;
			}
		 case "Thursday" : {
			$ket_hari = "Kamis";
			break;
			}
		 case "Friday" : {
			$ket_hari = "Jumat";
			break;
			}
		 case "Saturday" : {
			$ket_hari = "Sabtu";
			break;
			}
		 }
	$bln = date('F');
	switch($bulan_tmp){
		case "January" : {
			$ket_bln = "Januari";
			break;
		}
		case "February" : {
			$ket_bln = "Februari";
			break;
		}
		case "March" : {
			$ket_bln = "Maret";
			break;
		}
		case "April" : {
			$ket_bln = "April";
			break;
		}
		case "May" : {
			$ket_bln = "Mei";
			break;
		}
		case "Juny" : {
			$ket_bln = "Juni";
			break;
		}
		case "July" : {
			$ket_bln = "Juli";
			break;
		}
		case "August" : {
			$ket_bln = "Agustus";
			break;
		}
		case "September" : {
			$ket_bln = "September";
			break;
		}
		case "October" : {
			$ket_bln = "Oktober";
			break;
		}
		case "November" : {
			$ket_bln = "November";
			break;
		}
		case "December" : {
			$ket_bln = "Desember";
			break;
		}
	 }
	 RETURN $ket_hari."/".date('d')." ".$ket_bln." ".$tahun_tmp;
}
}
