<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Guest extends CI_Model{
	public function getDataStasiun(){
	
return $this->db->get('stasiun');	
}
public function cari_tiket($data)
{
$this->db->select('jadwal.*,asal.nama_stasiun AS ASAL,tujuan.nama_stasiun As TUJUAN');
//$this->db->where($data);
$this->db->like('tgl_berangkat', $this->input->post('tanggal'));
$this->db->from('jadwal');
$this->db->join('stasiun as asal','jadwal.asal= asal.id','left');
$this->db->join('stasiun as tujuan','jadwal.tujuan= tujuan.id','left');

	return $this->db->get();

}

public function getDataInfoPesan($id){
		$this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun As TUJUAN');
		$this->db->where('jadwal.id', $id);
		$this->db->join('stasiun as Asal','jadwal.asal = Asal.id', 'left');
		$this->db->join('stasiun as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
		return $this->db->get('jadwal');
	}
	public function insertPenumpang($data){
		return $this->db->insert('penumpang', $data);
	}

	public function insertPemesan($data){
		return $this->db->insert('tiket', $data);
	}
	public function insertPembayaran($data){
		return $this->db->insert('pembayaran', $data);
	}
	public function getTiket(){
		return $this->db->get('tiket');
	}
	public function getPembayaran(){
		return $this->db->get('pembayaran');
	}

public function cekKonfirmasi($nomor){
		$this->db->where('nomor_tiket', $nomor);
		return $this->db->get('penumpang');
	}
	public function getPembayaranWhere($kode){
		$this->db->where('no_pembayaran', $kode);
		return $this->db->get("pembayaran");
	}

	public function insertBukti($nama, $no){
		$data = array(
			'bukti'		=> $nama,
			'status'	=> 1
		);
		$this->db->where('bukti', $no);
		return $this->db->update("pembayaran", $data);
	}



	
}
