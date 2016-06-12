<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}
	
	public function authenticate()
	{
		$this->load->model('Login_model', 'lm');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$data = $this->lm->authenticate($email, $password);
		
		if($data) {
			$_SESSION['info'] = array(
				'uid' => $data->id,
				'firstname' => $data->firstname,
				'lastname' => $data->lastname,
				'user_type' => $data->user_type
			);
			unset($_SESSION['email']);
			redirect('main', 'location', 301);
		} else {
			$_SESSION['email'] = $email;
			redirect('login?error=1', 'location', 301);
		}
	}
	
	public function logout() {
		$this->session->sess_destroy();
		
		redirect('login?msg=1', 'location', 301);
	}
}
