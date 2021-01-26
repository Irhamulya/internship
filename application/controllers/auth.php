<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$this->form_validation->set_rules
		(
			'email',
			'Email',
			'trim|required|valid_email'
		);
		$this->form_validation->set_rules
		(
			'password',
			'Password',
			'trim|required'
		);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login page';
			$data['divisi'] = $this->db->get('ketentuan')->result_array();

			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			//validasi success
			$this->_login();
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You are logged out </div>');
		redirect('auth');
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			//jika user active
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('participant');
					}

				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password dude</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login fail dude</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email not registred dude</div>');
			redirect('auth');
		}
	}

	public function regist()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules
		(
			'name',
			'Name',
			'required|trim'
		);
		$this->form_validation->set_rules
		(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'this email has already regist'
			]
		);
		$this->form_validation->set_rules
		(
			'password1',
			'Password',
			'required|trim|min_length[6]|matches[password2]',
			['matches' => 'Password doesnot match!', 'min_length' => 'Password too short']
		);
		$this->form_validation->set_rules
		(
			'password2',
			'Password',
			'required|trim|matches[password1]'
		);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration form!!';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data =
				[
					'nama' => htmlspecialchars($this->input->post('name', true)),
					'email' => htmlspecialchars($email),
					'image' => 'default.jpg',
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => 2,
					'is_active' => 0,
					'date_created' => time()
				];

			//token

			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please Activate your account</div>');
			redirect('auth');
		}

	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'bdinternship7@gmail.com',
			'smtp_pass' => '121099asd',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->email->initialize($config);
		$this->email->from('bdinternship7@gmail.com', 'Pt. Pacifa Raya Technology');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
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
  background-color: #4169E1;"><p style="float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 1px 10px;
  text-decoration: none;
  font-size: 17px;">Vertification email</p></div>

  <h2 style="text-align: center;
  font-family: arial;
  padding: 8px 14px;"><b>Pt. Pacifa Raya Technology</b></h2>
  <p style="text-align: left;
  font-family: arial;
  padding: 8px 14px;">The account will be activated as soon as you press the activate button down below !!! </p>
  <p><a href="' . base_url() . '/auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" style="border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 97%;
  font-size: 18px;" id="gfg" onMouseOver="mouseover()"
   onMouseOut="mouseout()">Activate</a></p>
</div>
</body>
</html>	');
		}
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}


	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been Activated ! Please login</div>');
					redirect('auth');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token Exipired!.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token!.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
			redirect('auth');
		}

	}

	public function blocked()
	{

		$data['title'] = 'Forbidden Access';
		$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();
		$this->load->view('auth/blocked', $data);

	}

}
