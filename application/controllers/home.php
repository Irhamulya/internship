<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		cek_login();
	}
	public function index()
	{
		$data['title'] = 'Home page';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('dashboard_m');
		$data['jpeserta'] = $this->dashboard_m->Hitungpeserta();
		$data['huser'] = $this->dashboard_m->Hitunguser();
		$data['qouta'] = $this->dashboard_m->Hitungqouta();
		$data['divisi'] = $this->db->get('ketentuan')->result_array();

	/*	$divisi = $this->db->get('ketentuan')->result_array();
		$peserta = $this->db->get_where('peserta',['id_div' => $divisi['id']])->row_array();
		if ($divisi['qta']==0) {
			$divisi
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Untuk divisi</div>');
		}*/
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/home', $data);
		$this->load->view('templates/footer');
	} 

}

?>
