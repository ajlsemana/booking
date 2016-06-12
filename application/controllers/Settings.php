<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		if(! isset($_SESSION['info']['uid'])) {
			redirect('login', 'location', 301);
		}
		
		//Always get BMG 2015, 2016 to display on left sidebar etc..
		$this->load->model('company_settings_model', 'csm');

		$this->load->model('settings_model', 'sm');	
	}

	//start CURRENCIES
	public function currencies()
	{			
		$uri_crud = $this->uri->segment(3);
		$uri_ok = $this->uri->segment(4);
		
		if(isset($uri_crud)) {			
			$message['add'][0] = 'danger|Alert|Failed to add currency!';
			$message['add'][1] = 'success|Success|Successfully added new currency!';

			$message['update'][0] = 'danger|Alert|Failed to update currency!';
			$message['update'][1] = 'success|Success|Successfully updated currency!';

			$message['delete'][0] = 'danger|Alert|Failed to delete currency!';
			$message['delete'][1] = 'success|Success|Successfully deleted!';

			$data['message'] = $message[$uri_crud][$uri_ok];
		} else {
			$data['message'] = NULL;
		}

		$data ['title'] = 'Currencies';
		$data ['active'] = 'currencies';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Currencies' => NULL
			);				
		$data['currencies'] = $this->sm->get_currencies();
		$data['company_year'] = $this->csm->get_company_year();
		
		$this->load->view('template/header', $data);
		$this->load->view('settings/currencies/list');
		$this->load->view('template/footer');
	}

	public function add_form_currency()
	{			
		$data['message'] = NULL;
		$data ['title'] = 'Add Currency';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Add Currency' => NULL
			);
		$data ['active'] = 'currencies';
		$data['company_year'] = $this->csm->get_company_year();	

		$this->load->view('template/header', $data);
		$this->load->view('settings/currencies/insert');
		$this->load->view('template/footer');
	}

	public function insert_currency()
	{
		$param = array(
				'name' => $this->input->post('name'),
				'rate' => $this->input->post('rate')
			);
		$r = $this->sm->insert_currencies($param);
		
		redirect('settings/currencies/add/'.$r, 'location', 301);
	}

	public function update_form_currency()
	{			
		$data['message'] = NULL;
		$data ['title'] = 'Update Currency';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Update Currency' => NULL
			);		
		$data ['active'] = 'currencies';
		$data['data'] = $this->sm->get_currency($this->input->get('id'));
		$data['company_year'] = $this->csm->get_company_year();	

		$this->load->view('template/header', $data);
		$this->load->view('settings/currencies/update');
		$this->load->view('template/footer');
	}

	public function update_currency()
	{		
		$param = array(
				'name' => $this->input->post('name'),
				'rate' => $this->input->post('rate'),
				'updated_at' => date('Y-m-d H:i:s')					
			);
		$r = $this->sm->update_currencies($this->input->post('id'), $param);
		
		redirect('settings/currencies/update/'.$r.'?year='.$this->input->post('year'), 'location', 301);
	}

	public function delete_currency()
	{
		$checked = $this->input->post('selected');
		$r = $this->sm->delete_currencies($checked);
		$r = ($r > 0 ? 1 : 0);
		
		redirect('settings/currencies/delete/'.$r, 'location', 301);
	}
	//end CURRENCIES
}
