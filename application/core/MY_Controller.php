<?php if (!defined('BASEPATH')) exit('No direct script access
allowed');

class Shallom extends CI_Controller {
public $pengaturan;
 function __construct()
 {
 parent::__construct();
	$this->load->library(array('akses','session','table','pengaturan'));
	//$this->load->model('Mpengaturan');
	//$this->pengaturan = $this->Mpengaturan->pengaturan();
	$tabel = array(
        'table_open'            => '<table class="table table-striped table-bordered table-hover">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
);

$this->table->set_template($tabel);
 }
 function template($konten,$judul,$kolom) {
	$data['judul']=$judul;
	switch($kolom){
		case 1 :{
			$this->load->view('/template/1/head',$data);
			$this->load->view('/template/1/navbar',$data);
			$this->load->view($konten,$data);
			$this->load->view('/template/1/footer');
			break;
		}
		case 2 :{
			$this->load->view('/template/2/head',$data);
			$this->load->view('/template/2/style');
			$this->load->view('/template/2/navbar',$data);
			$this->load->view('/template/2/sidebar',$data);
			$this->load->view($konten,$data);
			$this->load->view('/template/2/footer');
			break;
		}
}
 }
 function cek_status_login($tipe)
 {
	if($this->access->cek_status_login() === FALSE) redirect('masuk');
	else
	{
		if($this->session->jenis != $tipe) die('Anda tidak berhak mengakses halaman ini!');
	}
 }
 
 function pesan($jenis = 'success',$pesan){
	$hasil="
	<br/><div class='alert alert-{$jenis} alert-dismissable'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		$pesan
	</div>";
	return $hasil;
}

 function konsol($pesan){
	 echo '<script>console.log("'.$pesan.'");</script>';
 }
 function data_combobox($sumber,$id,$nm,$pesan){
	if(isset($sumber)){
	$hasil['0'] = $pesan;
	foreach($sumber as $kombobox){
	$hasil[$kombobox->$id] = $kombobox->$nm;
	}
	}
	else $hasil['0'] = 'Data Kosong';
	RETURN $hasil;
 }
 function cek_tgl ($tgl) {
	if(preg_match("/(0[0-9]|[12][0-9]|3[01])-(0[1-9]|1[12])-(20[12][0-9])/",$this->input->post('Ttgl_kirim[]'))) RETURN TRUE;
	else {
	$this->form_validation->set_message('cek_tgl','Penulisan Tanggal yang Anda masukkan salah.');	
	RETURN FALSE;
	} 
 }
 function cek_jam ($jam) {
	if(preg_match("/([0-9]|1[0-9]|2[0-4]):([0-9]|[1-5][0-9])/",$this->input->post('Tjam_kirim[]'))) RETURN TRUE;
	else {
	$this->form_validation->set_message('cek_jam','Penulisan Jam yang Anda masukkan salah.');	
	RETURN FALSE;
	} 
 }
 function tgl_mysql($tanggal){
 $hasil = substr($tanggal,-4)."-".substr($tanggal,3,2)."-".substr($tanggal,0,2);
 RETURN $hasil;
 }
 function tanggal_now(){
	 $hari = date('l');
	 switch($hari){
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
	switch($bln){
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
 RETURN $ket_hari." / ".date('d')." ".$ket_bln." ".date('Y');
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
	 RETURN $ket_hari." / ".date('d')." ".$ket_bln." ".$tahun_tmp;
}
}


 class MY_Controller extends CI_Controller {
 function __construct()
 {
 parent::__construct();
 }
 }
