<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('form_validation');
			//Do your magic here
	}
	public function index()
	{
		$data['main_view'] = 'login_view';
		$this->load->View('login_template', $data);
	}

	public function dologin(){


		if($this->input->post('submit')){
			$this->form_validation->set_rules('Username', 'Username', 'trim|required');
			$this->form_validation->set_rules('Password', 'Password', 'trim|required');

			if($this->form_validation->run()){
				if($this->Login_model->login() != FALSE){
					redirect('index.php/Obat');
				}else{
					$data['main_view'] = 'login_view';
					$data['notif'] = 'Gagal';
					$this->load->view('login_template', $data);
				}
			}else{
				$data['main_view'] = 'login_view';
				$data['notif'] = validation_errors();
				$this->load->view('login_template', $data);
			}
		}
	}
}