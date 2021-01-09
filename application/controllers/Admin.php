<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		cek_login();
	}

	public function index()
	{
		$data['title'] = 'Admin Page';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('dashboard_m');
		$data['jpeserta'] = $this->dashboard_m->Hitungpeserta();
		$data['huser'] = $this->dashboard_m->Hitunguser();
		$data['qouta'] = $this->dashboard_m->Hitungqouta();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function divisi()
	{
		$data['title'] = 'Division page';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$data['divisi'] = $this->db->get('ketentuan')->result_array();

		$this->form_validation->set_rules('divisi', 'Divisi', 'required');
		$this->form_validation->set_rules('kouta', 'Kouta', 'required');

		if ($this->form_validation->run() == true) {
			$divisi = $this->input->post("divisi");
			$qta = $this->input->post("kouta");

			$isi = array
			(
				"divisi" => $divisi,
				"qta" => $qta

			);
			$this->db->insert("ketentuan", $isi);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data has been added dude!</div>');
			redirect('admin/divisi');
		} else {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/divisi', $data);
			$this->load->view('templates/footer');
		}
	}

	public function editdivisi($id)
	{
		$data['title']= 'Edit Division';
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['divisi']=$this->db->get('ketentuan')->result_array();
		$data['data']= $this->User_model->tampil($id);

		$this->form_validation->set_rules('nama','Nama Lengkap','required');
		$this->form_validation->set_rules('divisi','Divisi','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('sekolah','Sekolah','required');
		$this->form_validation->set_rules('tanggal_mulai','Tanggal Mulai','required');
		$this->form_validation->set_rules('tanggal_akhir','Tanggal Akhir','required');

		if ($this->form_validation->run()==true) {

			$id_divisi  	=$this->input->post("divisi");
			$nama       	=$this->input->post("nama");
			$alamat     	=$this->input->post("alamat");
			$sekolah    	=$this->input->post("sekolah");
			$tanggal_mulai	=$this->input->post('tanggal_mulai');
			$tanggal_akhir	=$this->input->post('tanggal_akhir');

			$isi=array
			(
				"id_div"        	=>$id_divisi,
				"nama"      		=>$nama,
				"alamat"    		=>$alamat,
				"sekolah"   		=>$sekolah,
				"tanggal_mulai"     =>$tanggal_mulai,
				"tanggal_akhir"     =>$tanggal_akhir,

			);
			$this->db->where('id', $id)->update('peserta', $isi);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Data has been updated dude!</div>');
			redirect('user/peserta');


		}else{

			$this->load->view('templates/header' , $data);
			$this->load->view('templates/sidebar' , $data);
			$this->load->view('templates/topbar' , $data);
			$this->load->view('user/editpeserta', $data);
			$this->load->view('templates/footer' );
		}
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}


	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id!=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeAccess()
	{

		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access', $data);
		} else {
			$this->db->delete('user_access', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
	}


}

?>
