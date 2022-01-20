<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function keHalamanLogin(){
		$this->load->view('admin/login');
	}
	public function login(){
		$data = array(
			'username' => $this-> input->post('Username'),
			'password' => $this-> input->post('Password') 
			 );
		$cek = $this->M_admin->cekLogin($data);
		if ($cek > 0){

			$sess = array('status'=> TRUE,
					'level'=>'admin' );
			//men set data atau sesi
			$this->session->set_userdata($sess) ;
			redirect(base_url('admin/dashboard'));
		}else{

		redirect(base_url('login'));

		}
}
	public function keHalamanDashboard () {
			if ($this->session->status == TRUE ) {

			$data['stasiun']= $this->M_admin->getDataStasiun()->result();

				$this->load->view('admin/dashboard',$data);
			}else{

				redirect(base_url('login'));
			}


	}

	public function logout(){
		session_destroy();
		redirect (base_url());
	}



public function tambah_stasiun ()
{
$nama = $this->input->post('stasiun');
$input = $this->M_admin->tambah_stasiun($nama);

redirect (base_url('admin/dashboard'));

}

public function hapus_stasiun($id){
	
$delete = $this->M_admin->delete_stasiun($id);
redirect (base_url('admin/dashboard'));
}

public function keHalamanEdit($id)
{
$data['data_stasiun']= $this->M_admin->getDataEditStasiun($id)->row();
$this->load->view('admin/edit_stasiun',$data);

}
public function edit_stasiun()
{
	$nama = $this->input->post('nama_stasiun');
	$edit = $this->M_admin->edit_stasiun($nama);
	redirect (base_url('admin/dashboard'));
}
public function keHalamanKelolaJadwal()
{
$data['stasiun'] = $this->M_admin->getDataStasiun()->result();
$data['jadwal'] = $this->M_admin->getJadwal()->result();
$this->load->view('admin/Kelola_Jadwal',$data);
}

public function tambah_jadwal()
{
	$data  = array('nama_bus' => $this->input->post('nama_bus') ,
				 	'asal' => $this->input->post('asal') ,
				 	'tujuan' => $this->input->post('tujuan') ,
				 	'tgl_berangkat' => $this->input->post('tgl_berangkat') ,
				 	'tgl_sampai' => $this->input->post('tgl_sampai') , 
				 	'kelas' => $this->input->post('kelas'),
				 	'harga' => $this->input->post('harga')

				 );
	$this->M_admin->tambah_jadwal ($data);
	redirect (base_url('admin/dashboard/kelola-jadwal'));

}

public function hapusJadwal($id)
{
$this->M_admin->hapusJadwal($id);
	redirect (base_url('admin/dashboard/kelola-jadwal'));

}
public function keHalamanEditJadwal($id){
		$data['data_edit'] = $this->M_admin->getDataEditJadwal($id)->row();
		$data['stasiun'] = $this->M_admin->getDataStasiun()->result();

		$this->load->view('admin/edit_jadwal', $data);
	}

public function edit_jadwal(){
		$data = array(
			'nama_bus' => $this->input->post('nama_bus'), 
			'asal' => $this->input->post('asal'), 
			'tujuan' => $this->input->post('tujuan'), 
			'tgl_berangkat' => $this->input->post('tgl_berangkat'), 
			'tgl_sampai' => $this->input->post('tgl_sampai'), 
			'kelas' => $this->input->post('kelas')
		);

		$this->M_admin->edit_jadwal($data);

		redirect(base_url('admin/dashboard/kelola-jadwal'));

	}

}
