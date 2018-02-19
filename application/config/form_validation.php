<?php
$config =
array(
'admin_data_pengguna'=>array(
					array(
					'field' => 'Tusername',
					'label' => 'Username',
					'rules' => 'required|max_length[12]|min_length[3]|alpha_dash|is_unique[tbpengguna.username]'
						),
					array(
					'field' => 'Temail',
					'label' => 'Email',
					'rules' => 'valid_email|is_unique[tbpengguna.email]'
						),
					array(
					'field' => 'Tnohp',
					'label' => 'Nomor Handphone',
					'rules' => 'required|min_length[12]|max_length[14]|numeric'
						),
					array(
					'field' => 'Tnm_pengguna',
					'label' => 'Nama Pengguna',
					'rules' => 'required|min_length[3]|max_length[30]'
						),
					array(
					'field' => 'Tsandi1',
					'label' => 'Kata Sandi',
					'rules' => 'required|max_length[20]|min_length[5]'
						),
					array(
					'field' => 'Tsandi2',
					'label' => 'Kata Sandi',
					'rules' => 'required|max_length[20]|min_length[5]|matches[Tsandi1]'
						),
					array(
					'field' => 'Cjenis',
					'label' => 'Jenis Pengguna',
					'rules' => 'callback_validasi_jenis'
					)
),
'admin_edit_pengguna'=>array(
					array(
					'field' => 'Temail',
					'label' => 'Email',
					'rules' => 'valid_email'
						),
					array(
					'field' => 'Tnohp',
					'label' => 'Nomor Handphone',
					'rules' => 'required|min_length[12]|max_length[14]|numeric'
						),
					array(
					'field' => 'Tnm_pengguna',
					'label' => 'Nama Pengguna',
					'rules' => 'required|min_length[3]|max_length[30]'
						),
					array(
					'field' => 'Cjenis',
					'label' => 'Jenis Pengguna',
					'rules' => 'callback_validasi_jenis'
					)
),
'admin_data_jenis_pengguna'=>array(
			array(
			'field' => 'Tnm_jenis',
			'label' => 'Nama Jenis',
			'rules' => 'required|min_length[3]|max_length[30]')
),
'admin_data_jenis_acara'=>array(
			array(
			'field' => 'Tnm_acara',
			'label' => 'Nama Acara',
			'rules' => 'required|min_length[3]|max_length[30]')
),
'admin_data_status_produk'=>array(
			array(
			'field' => 'Tnm_status_produk',
			'label' => 'Nama Status Produk',
			'rules' => 'required|min_length[3]|max_length[30]')
),
'admin_data_status_pembayaran'=>array(
			array(
			'field' => 'Tnm_status_pembayaran',
			'label' => 'Nama Status pembayaran',
			'rules' => 'required|min_length[3]|max_length[30]')
),
'admin_data_status_transaksi'=>array(
			array(
			'field' => 'Tnm_status_transaksi',
			'label' => 'Nama Status transaksi',
			'rules' => 'required|min_length[3]|max_length[30]')
),
'admin_data_kota'=>array(
			array(
			'field' => 'Tnm_kota',
			'label' => 'Nama Kota',
			'rules' => 'required|min_length[3]|max_length[50]'
			),
			array(
			'field' => 'Thrg_kota',
			'label' => 'Tarif Kota',
			'rules' => 'required|max_length[11]|numeric'
			)
),
'admin_data_tipe_produk'=>array(
			array(
			'field' => 'Tnm_tipe',
			'label' => 'Nama Tipe Produk',
			'rules' => 'required|min_length[3]|max_length[30]'
			),
			array(
			'field' => 'Thrg_tipe',
			'label' => 'Harga Tipe Produk',
			'rules' => 'required|max_length[11]|numeric'
			)
),
'admin_tambah_produk'=>array(
			array(
			'field' => 'Ctipe',
			'label' => 'Tipe Produk',
			'rules' => 'callback_validasi_tipe'
			),
			array(
			'field' => 'Ugambar',
			'label' => 'Foto Produk',
			'rules' => 'callback_validasi_upload'
			)
),
'publik_mendaftar'=>array(
			array(
			'field' => 'Tusername',
			'label' => 'Username',
			'rules' => 'required|is_unique[tbpengguna.username]|min_length[3]|max_length[12]|alpha_numeric'
			),
			array(
			'field' => 'Tnm_pengguna',
			'label' => 'Nama Pengguna',
			'rules' => 'required|min_length[3]|max_length[30]'
			),
			array(
			'field' => 'Tsandi1',
			'label' => 'Kata Sandi',
			'rules' => 'required|min_length[5]|max_length[13]|alpha_numeric'
			),
			array(
			'field' => 'Tsandi2',
			'label' => 'Kata Sandi',
			'rules' => 'required|callback_cek_sandi'
			),
			array(
			'field' => 'Tnohp',
			'label' => 'Nomor Handphone',
			'rules' => 'required|min_length[3]|max_length[14]|numeric'
			),
			array(
			'field' => 'Temail',
			'label' => 'Email',
			'rules' => 'min_length[3]|max_length[30]|valid_email'
			)
),
'publik_masuk'=>array(
			array(
			'field' => 'Tusername',
			'label' => 'Username',
			'rules' => 'required|alpha_numeric'
			),
			array(
			'field' => 'Tsandi',
			'label' => 'Kata Sandi',
			'rules' => 'required'
			),
			array(
			'field' => 'Tkecocokan',
			'label' => 'Username dan Kata Sandi',
			'rules' => 'callback_cek_login'
			)
),
'ganti_profil'=>array(
					array(
					'field' => 'Temail',
					'label' => 'Email',
					'rules' => 'valid_email'
						),
					array(
					'field' => 'Tnm_pengguna',
					'label' => 'Nama Pengguna',
					'rules' => 'required|min_length[3]|max_length[30]'
						),
					array(
					'field' => 'Tnohp',
					'label' => 'Nomor Handphone',
					'rules' => 'required|min_length[12]|max_length[14]|numeric'
						)
),
'ganti_password'=>array(
					array(
					'field' => 'Tsandi_lama',
					'label' => 'Kata Sandi Lama',
					'rules' => 'required|callback_cek_sandi'
						),
					array(
					'field' => 'Tsandi1',
					'label' => 'Kata Sandi',
					'rules' => 'required|max_length[20]|min_length[5]'
						),
					array(
					'field' => 'Tsandi2',
					'label' => 'Kata Sandi',
					'rules' => 'required|matches[Tsandi1]'
						)
),
'pesan_produk'=>array(
					array(
					'field' => 'Tnm_pengirim[]',
					'label' => 'Nama Pengirim',
					'rules' => 'required|min_length[3]|max_length[300]'
						),
					array(
					'field' => 'Tnm_penerima[]',
					'label' => 'Nama Penerima',
					'rules' => 'required|min_length[3]|max_length[300]'
						),
					array(
					'field' => 'Cjenis_acara[]',
					'label' => 'Jenis Acara',
					'rules' => 'callback_cek_acara'
						),
					array(
					'field' => 'Talamat[]',
					'label' => 'Alamat Tujuan',
					'rules' => 'required|min_length[5]|max_length[300]'
						),
					array(
					'field' => 'Ckota[]',
					'label' => 'Kota Tujuan',
					'rules' => 'callback_cek_kota'
						),
					array(
					'field' => 'Ttgl_kirim[]',
					'label' => 'Tanggal Dibutuhkan',
					'rules' => 'required|callback_cek_tgl'
						),
					array(
					'field' => 'Tjam_kirim[]',
					'label' => 'Jam Dibutuhkan',
					'rules' => 'required|callback_cek_jam'
						)
),
'konfirmasi_transaksi'=>array(
					array(
					'field' => 'Tnm_pembayar',
					'label' => 'Nama Pembayar',
					'rules' => 'required|min_length[3]|max_length[30]'
						),
					array(
					'field' => 'Tno_rekening',
					'label' => 'Nomor Rekening',
					'rules' => 'required|min_length[3]|max_length[20]|numeric'
						),
					array(
					'field' => 'Ubukti',
					'label' => 'Foto Bukti Pembayaran',
					'rules' => 'callback_validasi_upload'
						)
),
'admin_simpan_pengaturan'=>array(
			array(
			'field' => 'Tfooter',
			'label' => 'Tulisan Footer',
			'rules' => 'required|max_length[50]'
			),
			array(
			'field' => 'ulogo',
			'label' => 'Logo',
			'rules' => 'callback_validasi_upload'
			)
),
);
