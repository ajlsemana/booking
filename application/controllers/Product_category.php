<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_category extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		if(! isset($_SESSION['info']['uid'])) {
			redirect('login', 'location', 301);
		}
		
		//Always get BMG 2015, 2016 to display on left sidebar etc..
		$this->load->model('company_settings_model', 'csm');		

		$this->load->model('product_category_model', 'pcm');
		$this->load->model('main_model', 'mm');		
	}
	
	public function index()
	{		
		$uri_crud = $this->uri->segment(3);
		$uri_ok = $this->uri->segment(4);
		
		if(isset($uri_crud)) {			
			$message['add'][0] = 'danger|Alert|Failed to add product!';
			$message['add'][1] = 'success|Success|Successfully added new product!';

			$message['update'][0] = 'danger|Alert|Failed to update product!';
			$message['update'][1] = 'success|Success|Successfully updated product!';

			$message['delete'][0] = 'danger|Alert|Failed to delete product!';
			$message['delete'][1] = 'success|Success|Successfully deleted!';

			$data['message'] = $message[$uri_crud][$uri_ok];
		} else {
			$data['message'] = NULL;
		}

		$data ['title'] = 'Product Category';		
		$data ['active'] = 'product_category';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Product Category' => NULL
			);		
		$data['data'] = $this->pcm->view();
		$data['company_year'] = $this->csm->get_company_year();

		$this->load->view('template/header', $data);
		$this->load->view('settings/product_category/list');
		$this->load->view('template/footer');
	}

	public function add_form()
	{	
		$data['message'] = NULL;
		$data ['title'] = 'Add Product Category';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Add Product Category' => NULL
			);
		$data ['active'] = 'product_category';		
		$data['company_year'] = $this->csm->get_company_year();	

		$this->load->view('template/header', $data);
		$this->load->view('settings/product_category/insert');
		$this->load->view('template/footer');
	}

	public function insert()
	{
		$param = array(
				'product' => $this->input->post('name')				
			);
		$r = $this->pcm->insert($param);
		
		redirect('product_category/index/add/'.$r, 'location', 301);
	}

	public function update_form()
	{			
		$data['message'] = NULL;
		$data ['title'] = 'Update Product Category';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Update Product Category' => NULL
			);
		$data ['active'] = 'product_category';
		$data['data'] = $this->pcm->getProduct($this->input->get('id'));
		$data['company_year'] = $this->csm->get_company_year();			
		
		$this->load->view('template/header', $data);
		$this->load->view('settings/product_category/update');
		$this->load->view('template/footer');
	}

	public function update()
	{		
		$param = array(
				'product' => $this->input->post('name'),						
				'updated_at' => date('Y-m-d H:i:s')		
			);
		$r = $this->pcm->update($this->input->post('id'), $param);
		
		redirect('product_category/index/update/'.$r, 'location', 301);
	}

	public function delete()
	{
		$checked = $this->input->post('selected');
		$r = $this->pcm->delete($checked);
		$r = ($r > 0 ? 1 : 0);
		
		redirect('product_category/index/delete/'.$r, 'location', 301);
	}
}
