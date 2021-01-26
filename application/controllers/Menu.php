<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		cek_login();
	}

	public function index()
	{
		$data['title'] = 'Management';
		$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');

		} else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added dude!</div>');
			redirect('menu');
		}
	}

	//edit
	public function edit($id)
	{
		$data['title'] = 'Edit Menu';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['tampil'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();


		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == true) {

			$menu = $this->input->post("menu");

			$isi = array
			(
				"menu" => $menu
			);
			$this->db->where('id', $id)->update('user_menu', $isi);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data has been updated dude!</div>');
			redirect('menu/index');


		} else {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/editmenu', $data);
			$this->load->view('templates/footer');
		}
	}

	public function hapusmenu($id)
	{
		$this->load->model('Menu_model');

		$this->dashboard_m->hapus($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Hapus!</div>');
		redirect('menu/index');
	}

	public function SubMenu()
	{
		$data['title'] = 'Sub Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'menu');

		$data['submenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();


		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub	menu added dude!</div>');
			redirect('menu');
		}
	}

	public function editsubmenu($id)
	{
		$data['title'] = 'Edit Sub Menu';
		$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'menu');

		$data['menu'] = $this->db->get('user_menu')->result_array();
		$data['tampil'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/editsubmenu', $data);
			$this->load->view('templates/footer');
		} else {
			$isi = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->where('id', $id)->update('user_sub_menu', $isi);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub	menu added dude!</div>');
			redirect('menu/submenu');
		}
	}

	//ejet hapus
	public function hapus($id)
	{
		$this->load->model('Menu_model');
		$this->Menu_model->hapus($id);
		redirect('menu');
	}


}

?>
