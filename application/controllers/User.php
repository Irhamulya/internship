<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	

	
	public function __construct()
    {
            parent:: __construct();
            $this->load->model('User_model');
            cek_login();
            
    }
    
	public function index()
	{	
		$data['title']= 'My Profile';
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		

		$this->load->view('templates/header' , $data);
		$this->load->view('templates/sidebar' , $data);
		$this->load->view('templates/topbar' , $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer' );	
	}

	public function tglaw_rules($tanggal_mulai){
			if ($tanggal_mulai<date('d-m-Y'))
			{
             		$this->form_validation->set_message('tglaw_rules', 'This {field} field cant accept this');
			        return FALSE;
            }
			     
            else{
                	return TRUE;
                }
	}
	
		public function history(){
			$data['title']= 'Internship Page';
			$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();

			$this->load->model('User_model','user');

			$data['peserta']=$this->user->getDiv3();
			$data['divisi']=$this->db->get('ketentuan')->result_array();

			$this->form_validation->set_rules('nama','Nama Lengkap','required');
			$this->form_validation->set_rules('divisi','Divisi','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('sekolah','Sekolah','required');
			$this->form_validation->set_rules('srt_pkl','Surat PKL','required');
			$this->form_validation->set_rules('tanggal_mulai','Tanggal Mulai','required|callback_tglaw_rules');
			$this->form_validation->set_rules('tanggal_akhir','Tanggal Akhir','required|callback_tglaw_rules');

			if ($this->form_validation->run()==true) {
                    $nama       	=$this->input->post("nama");
                    $email       	=$this->input->post("email");
                    $alamat     	=$this->input->post("alamat");
                    $sekolah    	=$this->input->post("sekolah");
					$id_divisi  	=$this->input->post("divisi");
					$srt_pkl  		=$this->input->post("srt_pkl");
					$tanggal_mulai	=$this->input->post('tanggal_mulai');
					$tanggal_akhir	=$this->input->post('tanggal_akhir');

                    $isi=array
                    (
                        "id_div"        	=>$id_divisi,   
                        "nama"      		=>$nama,
                        "email"      		=>$email,
                        "alamat"    		=>$alamat,
                        "sekolah"   		=>$sekolah,
                        "srt_pkl"   		=>$srt_pkl,
                    	"tanggal_mulai"     =>$tanggal_mulai,
                    	"tanggal_akhir"     =>$tanggal_akhir,
                    	"status"			=>0
                        
                    );
                    $data_divisi = 
                        $this->db->query('SELECT * FROM ketentuan where id='.$id_divisi)->row();
                    $current_kouta= $data_divisi->qta;
                    $sisa_kouta   = $current_kouta-1;

                    if ($current_kouta>0) {
	                    $isi_kouta=array
	                    (   
	                        "qta"          => $sisa_kouta
	                    );      
	                    $this->db->where('id='.$id_divisi);
	                    $this->db->update("ketentuan",$isi_kouta);
	                    $this->db->insert("peserta",$isi);    
						$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Data has been added dude!</div>');
						redirect('user/history');		
                    }
                    else  {
                    	$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Sorry qouta has execeed the limit!</div>');
						redirect('user/history');
		      						
                     	
                    } 
			}else{

				$this->load->view('templates/header' , $data);
				$this->load->view('templates/sidebar' , $data);
				$this->load->view('templates/topbar' , $data);
				$this->load->view('user/history', $data);
				$this->load->view('templates/footer' );	
			}
			
		}


		public function peserta(){
			$data['title']= 'Internship Page';
			$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();

			$this->load->model('User_model','user');

			$data['peserta']=$this->user->getdivisi();
			$data['divisi']=$this->db->get('ketentuan')->result_array();

			$this->form_validation->set_rules('nama','Nama Lengkap','required');
			$this->form_validation->set_rules('divisi','Divisi','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('sekolah','Sekolah','required');
			$this->form_validation->set_rules('srt_pkl','Surat PKL','required');
			$this->form_validation->set_rules('tanggal_mulai','Tanggal Mulai','required|callback_tglaw_rules');
			$this->form_validation->set_rules('tanggal_akhir','Tanggal Akhir','required|callback_tglaw_rules');

			if ($this->form_validation->run()==true) {
                    $nama       	=$this->input->post("nama");
                    $email       	=$this->input->post("email");
                    $alamat     	=$this->input->post("alamat");
                    $sekolah    	=$this->input->post("sekolah");
					$id_divisi  	=$this->input->post("divisi");
					$srt_pkl  		=$this->input->post("srt_pkl");
					$tanggal_mulai	=$this->input->post('tanggal_mulai');
					$tanggal_akhir	=$this->input->post('tanggal_akhir');

                    $isi=array
                    (
                        "id_div"        	=>$id_divisi,   
                        "nama"      		=>$nama,
                        "email"      		=>$email,
                        "alamat"    		=>$alamat,
                        "sekolah"   		=>$sekolah,
                        "srt_pkl"   		=>$srt_pkl,
                    	"tanggal_mulai"     =>$tanggal_mulai,
                    	"tanggal_akhir"     =>$tanggal_akhir,
                    	"status"			=>0
                        
                    );
                    $data_divisi = 
                        $this->db->query('SELECT * FROM ketentuan where id='.$id_divisi)->row();
                    $current_kouta= $data_divisi->qta;
                    $sisa_kouta   = $current_kouta-1;

                    if ($current_kouta>0) {
	                    $isi_kouta=array
	                    (   
	                        "qta"          => $sisa_kouta
	                    );      
	                    $this->db->where('id='.$id_divisi);
	                    $this->db->update("ketentuan",$isi_kouta);
	                    $this->db->insert("peserta",$isi);    
						$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Data has been added dude!</div>');
						redirect('user/peserta');		
                    }
                    else  {
                    	$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Sorry qouta has execeed the limit!</div>');
						redirect('user/peserta');
		      						
                     	
                    } 
			}else{

				$this->load->view('templates/header' , $data);
				$this->load->view('templates/sidebar' , $data);
				$this->load->view('templates/topbar' , $data);
				$this->load->view('user/peserta', $data);
				$this->load->view('templates/footer' );	
			}
		}
	
	public function edit()
	{	
		$data['title']= 'Edit Profile';
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name','Full Name','required|trim');

		if ($this->form_validation->run() == false) {

		$this->load->view('templates/header' , $data);
		$this->load->view('templates/sidebar' , $data);
		$this->load->view('templates/topbar' , $data);
		$this->load->view('user/edit', $data);
		$this->load->view('templates/footer',$data );	

		}else{

			$name=$this->input->post('name');
			$email=$this->input->post('email');

			//cek gambar

			$upload_image=$_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types']='gif|jpg|png';
				$config['max_size']='2048';
				$config['max_width']= 1024;
				$config['max_height']= 768;
				$config['upload_path']='./asset/img/profile/';

				$this->load->library('upload',$config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH.'asset/img/profile/'.$old_image);
					}

					$new_image=$this->upload->data('file_name');
					$this->db->set('image',$new_image);
				}else{
					echo $this->upload->display_errors(); 
				}

			}

			$this->db->set('nama',$name);
			$this->db->where('email',$email);
			$this->db->update('user');
	        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Your profile has been updated :)</div>');
	      	redirect('user'); 

		}

		
	}


		public function changepass()
		{
		$data['title']= 'Change Password';
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('current_pass','Current Password','required|trim');
		$this->form_validation->set_rules('new_pass','New Password','required|trim|min_length[3]|matches[new_pass2]');
		$this->form_validation->set_rules('new_pass2','Confirm Password','required|trim|min_length[3]|matches[new_pass]');



		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header' , $data);
			$this->load->view('templates/sidebar' , $data);
			$this->load->view('templates/topbar' , $data);
			$this->load->view('user/changepass', $data);
			$this->load->view('templates/footer' );
		}else{
			$current_pass=$this->input->post('current_pass');
			$new_pass=$this->input->post('new_pass');
		
			if (!password_verify($current_pass,$data['user']['password'])) {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password</div>');
		      	redirect('user/changepass');				
			}else{
				if ($current_pass==$new_pass) {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">New password cannot be the same as current password</div>');
			      	redirect('user/changepass');	
				}else{
					$password_hash= password_hash($new_pass, PASSWORD_DEFAULT);

					$this->db->set('password',$password_hash);
					$this->db->where('email',$this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password changed</div>');
			      	redirect('user/changepass');	
				}
			}
		}

	}

	public function editpeserta($id)
    {
    	$data['title']= 'Edit Peserta';
		$data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['divisi']=$this->db->get('ketentuan')->result_array();
		$data['data'] = $this->User_model->tampil($id);

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
                    $this->db->where($id);
                    $this->db->update("peserta",$isi);
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

    public function hapuspeserta($id)
    {

		$this->load->model('User_model','user');

		$data['peserta']=$this->user->getdivisi();
		$data['divisi']=$this->db->get('ketentuan')->result_array();
		$id_divisi=$this->db->get_where('peserta', 'id_div');
    	
	    /**
	    if () {
	    	$isi_kouta=array
	    		(   
	    			"qta"          => $kouta_baru
	    		);
	        $this->db->where('id='.$id_divisi);
	        $this->db->update("ketentuan",$isi_kouta);            
	        $this->User_model->hapus($id);
	        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Hapus!</div>');
	        redirect('user/peserta');
	    }
	    */
	     
        $this->User_model->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di Hapus!</div>');
        redirect('user/peserta');
    }

   

	}
