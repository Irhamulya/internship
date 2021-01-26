<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		cek_login();
	}
	public function home()
	{
		$data['title'] = 'Home page';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('dashboard_m');
		$data['jpeserta'] = $this->dashboard_m->Hitungpeserta();
		$data['huser'] = $this->dashboard_m->Hitunguser();
		$data['qouta'] = $this->dashboard_m->Hitungqouta();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/home', $data);
		$this->load->view('templates/footer');
	} 

}

?>
