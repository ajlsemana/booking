<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_setting extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		if(! isset($_SESSION['info']['uid'])) {
			redirect('login', 'location', 301);
		}
		
		$this->load->model('company_settings_model', 'csm');	
	}
	
	public function index()
	{
		$uri_crud = $this->uri->segment(3);
		$uri_ok = $this->uri->segment(4);
		if(isset($uri_crud)) {			
			$message['add'][0] = 'danger|Alert|Failed to add new year!';
			$message['add'][1] = 'success|Success|Successfully added new year!';

			$message['update'][0] = 'danger|Alert|Failed to update currency!';
			$message['update'][1] = 'success|Success|Successfully updated year!';

			$message['delete'][0] = 'danger|Alert|Failed to delete year!';
			$message['delete'][1] = 'success|Success|Successfully deleted!';

			$message['failed'][0] = 'danger|Alert|Year was already taken!';			

			$data['message'] = $message[$uri_crud][$uri_ok];
		} else {
			$data['message'] = NULL;
		}

		$data ['title'] = 'Business Setting';
		$data ['active'] = 'business_setting';		
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Business Setting' => NULL
			);	
		$data['company_year'] = $this->csm->get_company_year();	
		$data['data'] = $this->csm->get_company_year();

		$this->load->view('template/header', $data);
		$this->load->view('company_year/list');
		$this->load->view('template/footer');		
	}

	public function add_form_year()
	{	
		$data['message'] = NULL;
		$data ['title'] = 'Add Company Year';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Add Company Year' => NULL
			);
		$data ['active'] = 'business_setting';
		$data['company_year'] = $this->csm->get_company_year();	

		$this->load->view('template/header', $data);
		$this->load->view('company_year/insert');
		$this->load->view('template/footer');
	}

	public function insert_year()
	{
		$param = array(
				'name' => $this->input->post('name'),
				'year' => $this->input->post('year')
			);
		
		$check = $this->csm->get_distinct_year($this->input->post('year'));

		if($check > 0) {
			redirect('company_setting/index/failed/0', 'location', 301);
		} else {
			$r = $this->csm->insert_company_year($param);			
			redirect('company_setting/index/add/'.$r, 'location', 301);
		}		
	}

	public function delete_year()
	{
		$checked = $this->input->post('selected');
		$r = $this->csm->delete_year($checked);
		$r = ($r > 0 ? 1 : 0);
		
		redirect('company_setting/index/delete/'.$r, 'location', 301);
	}
}
