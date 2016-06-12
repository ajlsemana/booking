<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		if(! isset($_SESSION['info']['uid'])) {
			redirect('login', 'location', 301);
		}
		
		//Always get BMG 2015, 2016 to display on left sidebar etc..
		$this->load->model('company_settings_model', 'csm');

		$this->load->model('customer_model', 'cm');	
	}
	
	public function index()
	{		
		$uri_crud = $this->uri->segment(3);
		$uri_ok = $this->uri->segment(4);
		
		if(isset($uri_crud)) {			
			$message['add'][0] = 'danger|Alert|Failed to add customer!';
			$message['add'][1] = 'success|Success|Successfully added new customer!';

			$message['update'][0] = 'danger|Alert|Failed to update customer!';
			$message['update'][1] = 'success|Success|Successfully updated customer!';

			$message['delete'][0] = 'danger|Alert|Failed to delete customer!';
			$message['delete'][1] = 'success|Success|Successfully deleted!';

			$data['message'] = $message[$uri_crud][$uri_ok];
		} else {
			$data['message'] = NULL;
		}

		$data ['title'] = 'Customers';		
		$data ['active'] = 'customers';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Customers' => NULL
			);		
		$data['data'] = $this->cm->view();		
		$data['company_year'] = $this->csm->get_company_year();
		
		$this->load->view('template/header', $data);
		$this->load->view('settings/customers/list');
		$this->load->view('template/footer');
	}

	public function add_form()
	{	
		$data['message'] = NULL;
		$data ['title'] = 'Add Customer';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Add Customer' => NULL
			);
		$data ['active'] = 'customers';		
		$data['company_year'] = $this->csm->get_company_year();	

		$this->load->view('template/header', $data);
		$this->load->view('settings/customers/insert');
		$this->load->view('template/footer');
	}

	public function insert()
	{
		$config['upload_path'] = './uploads/customers/';
		$config['allowed_types'] = 'jpg|jpg|png';		
		$this->load->library('upload', $config);
		$file_name = '';
		$error = array();

		if(! empty($_FILES['userfile']['name'])) {
			if ( ! $this->upload->do_upload('userfile')) {
	            $error = array('error' => $this->upload->display_errors());
	            redirect('customers/index/add/0?year='.$this->input->post('year'), 'location', 301);	
	        } else {
	            $data = array('upload_data' => $this->upload->data());              
	            $file_name = $this->upload->data('file_name');              
	        }
        }

		$param = array(
				'company' => $this->input->post('company'),
				'address' => $this->input->post('address'),
				'contact_person' => $this->input->post('contact_person'),
				'uploaded_file' => $file_name
			);
		$r = $this->cm->insert($param);
		
		redirect('customers/index/add/'.$r.'?year='.$this->input->post('year'), 'location', 301);
	}

	public function update_form()
	{			
		$data['message'] = NULL;
		$data ['title'] = 'Update Customer';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Update Customer' => NULL
			);		
		$data ['active'] = 'customers';
		$data['data'] = $this->cm->getCustomer($this->input->get('id'));
		$data['company_year'] = $this->csm->get_company_year();	
		
		$this->load->view('template/header', $data);
		$this->load->view('settings/customers/update');
		$this->load->view('template/footer');
	}

	public function update()
	{		
		$config['upload_path'] = './uploads/customers/';
		$config['allowed_types'] = 'jpg|jpg|png';		
		$this->load->library('upload', $config);
		$file_name = $this->input->post('old_pic');
		$error = array();
		
		if(! empty($_FILES['userfile']['name'])) {
			if($_FILES['userfile']['name'] != $this->input->post('old_pic')) {
				if ( ! $this->upload->do_upload('userfile')) {
		            $error = array('error' => $this->upload->display_errors());
		            redirect('customers/index/update/0?year='.$this->input->post('year'), 'location', 301);	
		        } else {	        	
		        	$path = 'uploads/customers/'.$this->input->post('old_pic');
		        	@unlink($path);

		            $data = array('upload_data' => $this->upload->data());              
		            $file_name = $this->upload->data('file_name');              
		        }
	    	}
		}				

		$param = array(
				'company' => $this->input->post('company'),
				'address' => $this->input->post('address'),
				'contact_person' => $this->input->post('contact_person'),
				'uploaded_file' => $file_name,
				'updated_at' => date('Y-m-d H:i:s')	
			);
		$r = $this->cm->update($this->input->post('id'), $param);
		
		redirect('customers/index/update/'.$r, 'location', 301);
	}

	public function delete()
	{
		$checked = $this->input->post('selected');
		$r = $this->cm->delete($checked);
		$r = ($r > 0 ? 1 : 0);
		
		redirect('customers/index/delete/'.$r, 'location', 301);
	}
}
