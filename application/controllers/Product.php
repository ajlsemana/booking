<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		if(! isset($_SESSION['info']['uid'])) {
			redirect('login', 'location', 301);
		}
		
		//Always get BMG 2015, 2016 to display on left sidebar etc..
		$this->load->model('company_settings_model', 'csm');		

		$this->load->model('product_model', 'pm');
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

		$data ['title'] = 'Product';		
		$data ['active'] = 'product';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Product' => NULL
			);		
		$data['data'] = $this->pm->view();		
		$data['company_year'] = $this->csm->get_company_year();

		$this->load->view('template/header', $data);
		$this->load->view('settings/product/list');
		$this->load->view('template/footer');
	}

	public function add_form()
	{	
		$data['message'] = NULL;
		$data ['title'] = 'Add Product';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Add Product' => NULL
			);
		$data ['active'] = 'product';		
		$data['company_year'] = $this->csm->get_company_year();	
		$data['categories'] = $this->pm->get_product_cat();

		$this->load->view('template/header', $data);
		$this->load->view('settings/product/insert');
		$this->load->view('template/footer');
	}

	public function insert()
	{
		$param = array(
				'cat_id' => $this->input->post('category'),			
				'product_name' => $this->input->post('product_name'),
				'price' => $this->input->post('price')
			);
		$r = $this->pm->insert($param);
		
		redirect('product/index/add/'.$r, 'location', 301);
	}

	public function update_form()
	{			
		$data['message'] = NULL;
		$data ['title'] = 'Update Product';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Update Product' => NULL
			);
		$data ['active'] = 'product';
		$data['data'] = $this->pm->getProduct($this->input->get('id'));
		$data['company_year'] = $this->csm->get_company_year();			
		$data['categories'] = $this->pm->get_product_cat();

		$this->load->view('template/header', $data);
		$this->load->view('settings/product/update');
		$this->load->view('template/footer');
	}

	public function update()
	{		
		$param = array(
				'cat_id' => $this->input->post('category'),
				'product_name' => $this->input->post('product_name'),
				'price' => $this->input->post('price'),						
				'updated_at' => date('Y-m-d H:i:s')		
			);
		$r = $this->pm->update($this->input->post('id'), $param);
		
		redirect('product/index/update/'.$r, 'location', 301);
	}

	public function delete()
	{
		$checked = $this->input->post('selected');
		$r = $this->pm->delete($checked);
		$r = ($r > 0 ? 1 : 0);
		
		redirect('product/index/delete/'.$r, 'location', 301);
	}
}
