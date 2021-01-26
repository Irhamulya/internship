<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operational extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		cek_login();
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
			redirect('operational/divisi');
		} else {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('operational/divisi', $data);
			$this->load->view('templates/footer');
		}
	}

	public function Editdivisi($id)
	{
		$data['title'] = 'Edit Divisi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['tampil'] = $this->db->get_where('ketentuan', ['id' => $id])->row_array();

		$this->form_validation->set_rules('divisi', 'Divisi', 'required');
		$this->form_validation->set_rules('kouta', 'Kouta', 'required');

		if ($this->form_validation->run() == true) {

			$divisi = $this->input->post("divisi");
			$kouta = $this->input->post("kouta");

			$isi = array
			(
				"divisi" => $divisi,
				"qta" => $kouta
			);
			$this->db->where('id', $id)->update('ketentuan', $isi);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data has been updated dude!</div>');
			redirect('operational/divisi');


		} else {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('operational/editdivisi', $data);
			$this->load->view('templates/footer');
		}
	}

	public function hapusdivisi($id)
	{
		$this->load->model('dashboard_m');

		$this->dashboard_m->hapus($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Hapus!</div>');
		redirect('operational/divisi');
	}

	public function worktime()
	{
		$data['title'] = 'Worktime setting';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$data['worktime'] = $this->db->get('worktime')->result_array();

		$this->form_validation->set_rules('work_in', 'Jam Masuk', 'required');
		$this->form_validation->set_rules('work_out', 'Jam Keluar', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		
		
		if ($this->form_validation->run() == true) {
			$work_in = $this->input->post("work_in");
			$work_out = $this->input->post("work_out");
			$description = $this->input->post("description");

			$isi = array
			(
				"work_in" => $work_in,
				"work_out" => $work_out,
				"description" => $description

			);
			$this->db->insert("worktime", $isi);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data has been added dude!</div>');
			redirect('operational/worktime');
		} else {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('operational/worktime', $data);
			$this->load->view('templates/footer');
		}
	}

	public function Editworktime($id)
	{
		$data['title'] = 'Edit Worktime';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['tampil'] = $this->db->get_where('worktime', ['id' => $id])->row_array();

		$this->form_validation->set_rules('work_in', 'Jam Masuk', 'required');
		$this->form_validation->set_rules('work_out', 'Jam Keluar', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		

		if ($this->form_validation->run() == true) {

			$work_in = $this->input->post("work_in");
			$work_out = $this->input->post("work_out");
			$description = $this->input->post("description");

			$isi = array
			(
				"work_in" => $work_in,
				"work_out" => $work_out,
				"description" => $description
			);
			$this->db->where('id', $id)->update('worktime', $isi);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data has been updated dude!</div>');
			redirect('operational/worktime');


		} else {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('operational/editworktime', $data);
			$this->load->view('templates/footer');
		}
	}

	public function hapusworktime($id)
	{
		$this->load->model('dashboard_m');

		$this->dashboard_m->hapuswt($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Hapus!</div>');
		redirect('operational/worktime');
	}
}

?>
