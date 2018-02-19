<h1>Pesan Produk</h1>
<section>
<?php
echo form_open('pesan/'.$jumlah,'pesan');
for($i=1;$i<=$jumlah;$i++){
echo "<div class='well well-sm'>";
echo "<legend>Data Pemesanan Ke-$i</legend>";
echo "<div class='form-group ".$this->session->flashdata('Cproduk')."'>".form_dropdown('Tipe Produk (Ukuran) ','Cproduk[]',$produk,set_select('Cproduk[]'));
echo form_error('Cproduk[]','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tnm_pengirim')."'>".form_input('Nama Pengirim pada karangan bunga ','Contoh : Saudara Fulan,Dari PT.BNP,Dr.Ir. Fulan','Tnm_pengirim[]');
echo form_error('Tnm_pengirim[]','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tnm_penerima')."'>".form_input('Nama Penerima pada karangan bunga ','Contoh : Dari PT.BNP, Dari Anak-anak RPL','Tnm_penerima[]');
echo form_error('Tnm_penerima[]','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Cjenis_acara')."'>".form_dropdown('Jenis Acara ','Cjenis_acara[]',$jenis_acara,set_select('Cjenis_acara[]'));
echo form_error('Cjenis_acara[]','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Ckota')."'>".form_dropdown('Kota Tujuan ','Ckota[]',$kota,set_select('Ckota[]'));
echo form_error('Ckota[]','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Ttgl_kirim')."'>".form_input('Tanggal Dibutuhkan ','Sekarang Tanggal '.date("d-m-Y"),'Ttgl_kirim[]',set_value('Ttgl_kirim[]'));
echo form_error('Ttgl_kirim[]','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Tjam_kirim')."'>".form_input('Jam Dibutuhkan ','Sekarang Jam '.date("H:i"),'Tjam_kirim[]',set_value('Tjam_kirim[]'));
echo form_error('Tjam_kirim[]','<span class="help-block">','</span>');
echo "</div>";

echo "<div class='form-group ".$this->session->flashdata('Talamat')."'>".form_textarea('Alamat Lengkap ','Maksimal 300 karakter','Talamat[]',set_value('Talamat[]'));
echo form_error('Talamat[]','<span class="help-block">','</span>');
echo "</div></div>";
}
?>
<button type="submit" class="btn btn-success">Proses</button>
<a href="<?php echo base_url(); ?>" class="btn btn-primary">Kembali</a>
</form>
</section>
<br />
