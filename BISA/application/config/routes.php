<?php
defined('BASEPATH') OR exit('No direct script access allowed');




$route['kirimKonfirmasi'] = 'guest/kirimKonfirmasi';
$route['cekKonfirmasi'] = 'guest/cekKonfirmasi';
$route['pembayaran'] = 'guest/keHalamanPembayaran';
$route['pesanTiket'] = 'guest/pesanTiket';
$route['pesan/(:any)'] = 'guest/pesan/$1';
$route['editJadwal'] = 'admin/edit_jadwal';
$route['admin/dashboard/edit-jadwal/(:any)'] = 'admin/keHalamanEditJadwal/$1';
$route['hapusJadwal/(:any)'] ='admin/hapusJadwal/$1';
$route['tambahJadwal'] ='admin/tambah_jadwal';
$route['admin/dashboard/kelola-jadwal'] ='admin/keHalamanKelolaJadwal';
$route['cariTiket'] ='guest/cari_tiket';
$route['edit_stasiun'] ='admin/edit_stasiun';
$route['admin/dashboard/edit(:any)'] ='admin/keHalamanEdit/$1';
$route['login'] = 'admin/keHalamanLogin';
$route['hapusStasiun/(:any)'] ='admin/hapus_stasiun/$1';
$route['prosesLogin'] ='admin/Login';
$route['logout'] = 'admin/Logout';
$route['admin/dashboard'] ='admin/keHalamanDashboard';

//tambahStasiun
$route['tambahStasiun'] ='admin/tambah_stasiun';
//hapusStasiun



$route['konfirmasi'] = 'guest/keHalamanKonfirmasi';
$route['default_controller'] = 'guest/keHalamanDepan';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
