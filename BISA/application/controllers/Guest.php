<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

 public function keHalamanDepan(){
 	$data['judul'] = 'halaman_depan';
 	$data['stasiun'] =  $this->M_guest->getDataStasiun()->result();

$this->load->view('guest/template/header',$data);
 $this->load->view('guest/halaman_depan');
 $this->load->view('guest/template/footer');

}
public function keHalamanKonfirmasi(){
	$data['judul'] = 'halaman_konfirmasi';
	if(isset($_GET['kode'])):
			$kode = $_GET['kode'];
			$data['no_tiket'] = $this->M_guest->getPembayaranWhere($kode)->row();
			$data['detail'] = $this->M_guest->cekKonfirmasi($data['no_tiket']->no_tiket)->result();
endif;
$this->load->view('guest/template/header',$data);
 $this->load->view('guest/halaman_konfirmasi');
  $this->load->view('guest/template/footer');

}

public function cari_tiket()
{
$data = array(
	'asal' =>$this->input->post('asal') , 
	'tujuan' =>$this->input->post('tujuan')
	  );
	

$data['tiket'] = $this->M_guest->cari_tiket('$data')->result();
$data['penumpang'] = $this->input->post('jumlah'); 
$data['judul'] = 'halaman_depan';
$data['stasiun'] =  $this->M_guest->getDataStasiun()->result();

$this->load->view('guest/template/header',$data);
 $this->load->view('guest/halaman_depan');
 $this->load->view('guest/template/footer');
}
public function pesan($id){
		$data['judul'] = 'Formulir Data Diri';

		$data['info'] = $this->M_guest->getDataInfoPesan($id)->row();
		$data['id_jadwal'] = $id;

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/data_diri');
		$this->load->view('guest/template/footer');
	}

public function pesanTiket(){
		$penumpang = $this->input->post('penumpang');

		// Generate No Pembayaran
		$cek = $this->M_guest->getPembayaran()->num_rows()+1;

		$no_pembayaran = 'AC246'.$cek;
		
		$harga = $this->input->post('harga');

		$total_pembayaran = $penumpang*$harga;

		// Input Pembayaran
		$no_tiket = 'T00'.$cek;

		$data = array(
			'no_pembayaran' => $no_pembayaran,
			'no_tiket' => $no_tiket,
			'total_pembayaran' => $total_pembayaran,
			'status' => 0
		);

		$this->M_guest->insertPembayaran($data);


		// Generate Nomor Tiket
		$cek = $this->M_guest->getTiket()->num_rows()+1;

		

		// Input data Penumpang
		for ($i=1;$i<=$penumpang;$i++) { 
			$data = array(
				'nomor_tiket' => $no_tiket,
				'nama' => $this->input->post('nama'.$i),
				'no_identitas' => $this->input->post('identitas'.$i)
			);

			$this->M_guest->insertPenumpang($data);
		}

		// input Data Pemesan
		$data = array(
			'nomor_tiket' => $no_tiket,
			'id_jadwal' => $this->input->post('id_jadwal'),
			'nama_pemesan' => $this->input->post('nama_pemesan'), 
			'email' => $this->input->post('email'), 
			'no_telepon' => $this->input->post('no_telp'), 
			'alamat' => $this->input->post('alamat'),
			//'tanggal' => date('Y-m-d h:i:s')

		);

		$this->M_guest->insertPemesan($data);

		$this->session->set_flashdata('nomor', $no_pembayaran);
		$this->session->set_flashdata('total', $total_pembayaran);
		redirect('pembayaran', $total_pembayaran);
		
	}

	public function keHalamanPembayaran(){
		$data['judul'] = 'Konfirmasi Pembayaran';


		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/pembayaran');
		$this->load->view('guest/template/footer');
	}
public function cekKonfirmasi()
{
		$kode = $this->input->post('kode');

		redirect("konfirmasi?kode=".$kode);
}

public function kirimKonfirmasi(){
		// Uploading Gambar
		$config['upload_path']          = './assets/bukti/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048; // 2MB

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('bukti')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}else{
			$data = $this->upload->data();
			$fileName = $data['bukti'];
			
			$no = $this->input->post('no_pembayaran');
			$this->M_guest->insertBukti($bukti, $no );

			$this->session->set_flashdata("pesan","Berhasil Mengirim Bukti! Silahkan Cek Kembali 12 Jam Kemudian. Untuk Mengecek Pembayaran Anda");
			redirect("konfirmasi");
		}
	
	}
	
}

