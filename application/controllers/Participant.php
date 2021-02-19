<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Participant extends CI_Controller
{


	public function __construct()
	{
		parent:: __construct();
		$this->load->model('M_Participant');
		cek_login();
		$this->load->helper(array('form', 'url', 'download'));
	}


	public function index()
	{
		$data['title'] = 'Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_participant', $data);
		$this->load->view('templates/topbar_participant', $data);
		$this->load->view('participant/index', $data);
		$this->load->view('templates/footer');
	}

	public function application()
	{
		$data['title'] = 'Registration Page';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('M_Participant', 'participant');

		$data['peserta'] = $this->participant->getdiv();
		$data['peserta2'] = $this->participant->getdiv2();
		$data['divisi'] = $this->db->get('ketentuan')->result_array();
		$data['sekolah'] = $this->db->get('sekolah')->result_array();

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('divisi', 'Divisi', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('sekolah', 'Sekolah', 'required');
		$this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required');

		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$tanggal_mulai = $this->input->post("tanggal_mulai");

		$user_email = $user['email'];
		$cek_double = $this->db->get_where('peserta', ['email' => $user_email])->num_rows();

		if ($this->form_validation->run() == true) {
			$id_divisi = $this->input->post("divisi");
			$nama = $this->input->post("nama");
			$email = $this->input->post("email");
			$alamat = $this->input->post("alamat");
			$sekolah = $this->input->post("sekolah");
			$tanggal_mulai = $this->input->post('tanggal_mulai');
			$tanggal_akhir = $this->input->post('tanggal_akhir');
			if ($cek_double > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak bisa melakukan pendaftaran, karena anda telah terdaftar sebagai peserta magang!!</div>');
				redirect('participant/application');
			}

			$isi = array
			(
				"id_div" => $id_divisi,
				"nama" => $nama,
				"email" => $email,
				"alamat" => $alamat,
				"sekolah" => $sekolah,
				"tanggal_mulai" => $tanggal_mulai,
				"tanggal_akhir" => $tanggal_akhir,
				"status" => 0
			);
			$this->db->insert("pendaftar", $isi);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data has been added dude!</div>');
			redirect('participant/application');

		} else {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_participant', $data);
			$this->load->view('templates/topbar_participant', $data);
			$this->load->view('participant/application', $data);
			$this->load->view('templates/footer');
		}
	}

	public function sekolah()
	{
		$data['title'] = 'School page';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['sekolah'] = $this->db->get('sekolah')->result_array();

		$this->form_validation->set_rules('sekolah', 'Sekolah','required|trim|is_unique[sekolah.sekolah]', ['is_unique' => 'Sekolah ini sudah terdaftar']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$sekolah=$this->db->get('sekolah')->result_array();

		if ($this->form_validation->run() == true) {
			$alamat = $this->input->post("alamat");
			$user=$this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$user_email=$user['email'];
			$isi = array
			(
				"user_email"=>$user_email,
               	"sekolah" => htmlspecialchars($this->input->post('sekolah', true)),
				"alamat" => $alamat

			);
			$this->db->insert("sekolah", $isi);
			$this->session->set_flashdata('message', ' < div class="alert alert-success" role = "alert" > new Data has been added dude!</div > ');
			redirect('participant/sekolah');
		} else {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('participant/sekolah', $data);
			$this->load->view('templates/footer');
		}
	}

	public function lakukan_download1()
	{
		force_download('./asset/doc/SURAT PERNYATAAN.docx', NULL);
	}
	public function lakukan_download2()
	{
		force_download('./asset/doc/SURAT PERNYATAAN.pdf', NULL);
	}
	public function tolakpeserta($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('M_Participant', 'participant');

		$data['peserta'] = $this->participant->getdiv();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('participant/application', $data);
		$this->load->view('templates/footer');
		$this->_sendEmail2($id);
		$this->db->set('status', 0);
		$this->db->where('id', $id);
		$this->db->update('pendaftar');
		$this->db->insert("history", $this->participant->tampil($id));
		$this->hapuspeserta($id);

		$this->session->set_flashdata('message', ' < div class="alert alert-success" role = "alert" > Data has been updated </div > ');
		redirect('participant/application');

	}

public function pindahpeserta($id)
	{

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('M_Participant', 'application');

		$data['peserta'] = $this->application->getdiv();
		
		$d = $this->application->tampil($id);
		$id_divisi = $d['id_div'];
		$id = $d['id'];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('participant/application', $data);
		$this->load->view('templates/footer');

		$this->_sendEmail($id);

		$data_divisi =
			$this->db->query('SELECT * FROM ketentuan where id = ' . $id_divisi)->row();
		$current_kouta = $data_divisi->qta;
		$sisa_kouta = $current_kouta - 1;
		if ($current_kouta > 0) {
			$isi_kouta = array
			(
				"qta" => $sisa_kouta
			);
			$this->db->where('id = ' . $id_divisi);
			$this->db->update("ketentuan", $isi_kouta);

		} elseif ($current_kouta == 0) {
			$this->session->set_flashdata('message', ' < div class="alert alert-danger" role = "alert" > Sorry qouta has execeed the limit!</div > ');
			redirect('participant/application');


		}
		$this->db->set('status', 2);
		$this->db->where('id', $id);
		$this->db->update('pendaftar');
		$this->db->insert("peserta", $this->application->tampil($id));

		$this->hapuspeserta($id);

		$this->session->set_flashdata('message', ' < div class="alert alert-success" role = "alert" > Data has been updated </div > ');
		redirect('participant/application');


	}


	//Email penerimaan
	private function _sendEmail($id)
	{
		$this->load->model('M_Participant', 'participant');
		$d = $this->participant->tampil($id);
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'testbaruing@gmail.com',
			'smtp_pass' => '123testinG',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];
		//$pesan=$this->input->post('pesan');

		$this->email->initialize($config);
		$this->email->from('testbaruing@gmail.com', 'Pt. Pacifa Raya Technology');
		$this->email->to($d['email']);
		$this->email->subject('Congratulations !!');
		$this->email->message('<!DOCTYPE html>
			<html>
			<head>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

			</head>
			<body>

			<div class="card" style="border-style: outset; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			  max-width: 500px;
			  margin: auto;
			  font-family: arial;">
			<div class="topnav" style="overflow: hidden;
			  background-color: #36B9CC;"><p style="float: left;
			  display: block;
			  color: white;
			  text-align: center;
			  padding: 1px 10px;
			  text-decoration: none;
			  font-size: 17px;">Congratulations !!! </p></div>

			  <h2 style="text-align: center;
			  font-family: arial;
			  padding: 8px 14px;"><b>Pt. Pacifa Raya Technology Info</b></h2>
			  <p style="text-align: left;
			  font-family: arial;
			  padding: 8px 14px;">'.$pesan.'</p>
			  <p>Please download the response letter : <a href="'.base_url().'/participant/lakukan_download1">Surat Balasan.docx</a></p>
			  <p>Please download the response letter : <a href="'.base_url().'/participant/lakukan_download2">Surat Peraturan.pdf</a></p>
			  <p style="
			  left: 0;
			  bottom: 1;
			  width: 100%;
			  background-color: #227985;
			  color: white;
			  text-align: center;">PacifaRayaTechnology</p>
			</div>
			</body>
			</html>	');
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}


	}

	//Email penolakan
	private function _sendEmail2($id)
	{
		$this->load->model('M_Participant', 'participant');
		$d = $this->participant->tampil($id);
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'testbaruing@gmail.com',
			'smtp_pass' => '123testinG',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->email->initialize($config);
		$this->email->from('testbaruing@gmail.com', 'Pt. Pacifa Raya Technology');
		$this->email->to($d['email']);
		$this->email->subject('Informations !!');
		$this->email->message('<!DOCTYPE html>
			<html>
			<head>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

			</head>
			<body>

			<div class="card" style="border-style: outset; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			  max-width: 500px;
			  margin: auto;
			  font-family: arial;">
			<div class="topnav" style="overflow: hidden;
			  background-color: #36B9CC;"><p style="float: left;
			  display: block;
			  color: white;
			  text-align: center;
			  padding: 1px 10px;
			  text-decoration: none;
			  font-size: 17px;">We are so Sorry !!! </p></div>

			  <h2 style="text-align: center;
			  font-family: arial;
			  padding: 8px 14px;"><b>Pt. Pacifa Raya Technology Info</b></h2>
			  <p style="text-align: left;
			  font-family: arial;
			  padding: 8px 14px;">We were sorry, you are not the choosen one for the internship position !!! </p>
			  <p style="
			  left: 0;
			  bottom: 1;
			  width: 100%;
			  background-color: #227985;
			  color: white;
			  text-align: center;">PacifaRayaTechnology</p>
			</div>

			</body>
			</html>	');
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}


	}

	public function hapuspeserta($id)
	{
		$this->load->model('M_Participant', 'participant');
		$this->participant->hapus($id);
		redirect('participant/application');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_participant', $data);
			$this->load->view('templates/topbar_participant', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer', $data);

		} else {

			$name = $this->input->post('name');
			$email = $this->input->post('email');

			//cek gambar


			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './asset/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH.'asset/img/profile/'.$old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}

			}

			$this->db->set('nama', $name);
			$this->db->where('email', $email);
			$this->db->update('user');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated :)</div>');
			redirect('user');

		}


	}


	public function changepass()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('current_pass', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_pass', 'New Password', 'required|trim|min_length[3]|matches[new_pass2]');
		$this->form_validation->set_rules('new_pass2', 'Confirm Password', 'required|trim|min_length[3]|matches[new_pass]');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_participant', $data);
			$this->load->view('templates/topbar_participant', $data);
			$this->load->view('user/changepass', $data);
			$this->load->view('templates/footer');
		} else {
			$current_pass = $this->input->post('current_pass');
			$new_pass = $this->input->post('new_pass');

			if (!password_verify($current_pass, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
				redirect('user/changepass');
			} else {
				if ($current_pass == $new_pass) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password</div>');
					redirect('user/changepass');
				} else {
					$password_hash = password_hash($new_pass, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed</div>');
					redirect('user/changepass');
				}
			}
		}

	}

}

?>
