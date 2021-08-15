<?php 

	class User extends CI_Controller{
			
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('form_validation');
			$this->load->model('user_model');
			$this->load->model('post_model');
			$this->load->library('session');
		}
		
		
		
		public function login(){
			
			if($this->session->has_userdata('id')){
				redirect('user/home');
			}
			
		
			$this->load->view('login_form');
		}

		public function login_user(){
		
			
			$this->form_validation->set_rules('email','Email','required');

			if($this->form_validation->run()==FALSE){
				$this->load->view('login_form');
			}else{
				$email = $this->input->post('email');
				$this->load->database();
				$this->load->model('user_model');
				if($user = $this->user_model->getUser($email)){
					$this->load->library('session');
					$this->session->set_userdata('id',$user->id);
					redirect('user/home');
				}else{
					echo "No account exists with this email!";
				}
			}

		
		}

		public function home(){
			$user_id = $this->session->userdata('id');
			$user = $this->user_model->getUserById($user_id);
			$posts = $this->post_model->getUserPosts($user_id);
			$this->load->view('home',compact('user','posts'));
		}

		public function logout(){
			
		
			$this->session->unset_userdata('id');
			redirect('user/login');
		}
	}
