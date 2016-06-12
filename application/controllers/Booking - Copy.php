<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
	private $convert = array(
			'AED' => 3.673,
			'EUR' => 0.91,
			'SAR' => 3.75,
			'USD' => 1
		);
		
	public function __construct() {
		parent::__construct();
		
		if(! isset($_SESSION['info']['uid'])) {
			redirect('login', 'location', 301);
		}
		
		//Always get BMG 2015, 2016 to display on left sidebar etc..
		$this->load->model('company_settings_model', 'csm');

		$this->load->model('booking_model', 'bm');	
		$this->load->model('settings_model', 'sm');	
		$this->load->model('customer_model', 'cm');	
	}
	
	public function index()
	{				
		$year = $this->input->get('year');
		$uri_crud = $this->uri->segment(3);
		$uri_ok = $this->uri->segment(4);
		
		if(isset($uri_crud)) {			
			$message['add'][0] = 'danger|Alert|Failed to add booking!';
			$message['add'][1] = 'success|Success|Successfully added new booking!';

			$message['update'][0] = 'danger|Alert|Failed to update booking!';
			$message['update'][1] = 'success|Success|Successfully updated booking!';

			$message['delete'][0] = 'danger|Alert|Failed to delete booking!';
			$message['delete'][1] = 'success|Success|Successfully deleted!';

			$data['message'] = $message[$uri_crud][$uri_ok];
		} else {
			$data['message'] = NULL;
		}

		$data ['title'] = 'Booking List';		
		$data ['active'] = 'booking'.$year;
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Booking' => NULL
			);		
		$data['selected_year'] = $year;
		$data['data'] = $this->bm->view($year);		
		$data['company_year'] = $this->csm->get_company_year();
		
		$this->load->view('bmg/template/header', $data);
		$this->load->view('bmg/booking/list');
		$this->load->view('bmg/template/footer');
	}

	public function get_specific()
	{
		$year = $this->input->get('year');	
		$id = $this->input->get('id');

		$data['message'] = NULL;
		$data['data'] = $this->bm->getSpecificBooking($this->input->get('id'));		
		$data ['title'] = '';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				$data['data']->booking_name => NULL
			);		
		$data ['active'] = 'booking'.$year;
		$data ['order_details'] = $this->getOrders($data['data']->booking_name);		
		$data ['json_products'] = $this->getProducts();
		$data['company_year'] = $this->csm->get_company_year();
		$data['currencies'] = $this->sm->get_currencies();
		$data['customers'] = $this->cm->view();

		$this->load->view('bmg/template/header', $data);
		$this->load->view('bmg/booking/distinct_booking');
		$this->load->view('bmg/template/footer');
	}
	
	public function crud_option($booking_name = '', $rate = 0) {
		if(isset($_POST['list'])) {	
			$dlist = $_POST['list'];
			
			if(isset($dlist["updateList"])) {
				$dlist["updateList"] = $this->updateList($dlist["updateList"], $rate);
			}

			if(isset($dlist["addList"])) {
				$dlist["addList"] = $this->addList($dlist["addList"], $booking_name, $rate);
			}		
		}
	}
	
	public function deleteList()
	{
		$ids = $this->input->post('datas'); 
		$this->bm->deleteList($ids);

		echo "{\"result\": \"success\"}";
	}
	
	public function addList($addList, $booking_name = '', $currency = 0)
	{		
		$product2=array();
		foreach($addList as $i => $value):
			$product2["id"] = NULL;
			$product2["booking_name"]=$booking_name;
			$product2["product_category"]=$addList[$i]["product_category"];
			$product2["product"]=$addList[$i]["product"];                  
			$product2["price"]=$addList[$i]["price"];                  
			$product2["converted_price"]=round($addList[$i]["price"] * (float) $currency);                 
			$product2["qty"]=$addList[$i]["qty"];                  
			$product2["discount"]=$addList[$i]["discount"];                  
			
			$discount = (int) $addList[$i]["discount"] / 100;
			$qty = $addList[$i]['qty'];
			$price = $addList[$i]['price'];
			$t = (float)$price * (int)$qty;
			$d = $t * $discount;
			$total = $t - $d;
			
			$product2["total"]=$total;			
			$product2["converted_total"]=round((float)$total * (float) $currency);			

			$pk_id = $this->bm->addList($product2);
		endforeach;

		#echo "{\"recId\": \"" . $pk_id . "\"}";
		echo "{\"result\": \"success\"}";
	}
	
	public function updateList($updateList, $currency = 0)
	{
		$products = json_decode($_SESSION["orders"], true);         
		$product2=array();
		$id = 0;
		
		foreach ($updateList as $product)
		{
			$id = $product["id"];			
			foreach($products as $i => $products2){
				if($products2["id"] == $id) {
					$product2["product_category"]=$product["product_category"];			
					$product2["product"]=$product["product"];
					$product2["price"]=$product["price"]; 
					$product2["converted_price"]=round($product["price"] * (float) $currency);		
					$product2["qty"]=$product["qty"];                  
					$product2["discount"]=$product["discount"];

					$total = 0;
					$discount = (float) $product['discount'] / 100;
					$qty = $product['qty'];
					$price = $product['price'];
					$t = $price * $qty;
					$d = (float) $t * (float) $discount;
					$total = $t - $d;   
					$product2["total"]=$total;	
					$product2["converted_total"]=round($total * (float) $currency);					
				}        
			}
			$this->bm->updateList($product2, $id);
		}
		
		echo "{\"result\": \"success\"}";
	}
	
	public function crud()
	{		
		if(isset($_POST['list'])) {	
			$dlist = $_POST['list'];
			if( isset($dlist["addList"]))    
			{ 
				$products = json_decode($_SESSION['orders'], true); 
				//sort by product ID to get max ProductID
				usort($products, function($a, $b)
				{
					return ($a["id"] > $b["id"]);
				});    
				$max = $products[sizeof($products)-1]["id"];    
				
				$product2=array();    
				$product2["id"] = NULL;
				$product2["booking_name"]=$booking_name;
				$product2["product_category"]=$_GET["product_category"];
				$product2["product"]=$_GET["product"];                  
				$product2["price"]=$_GET["price"];                  
				$product2["converted_price"]=round($_GET["price"] * (float) $currency);                 
				$product2["qty"]=$_GET["qty"];                  
				$product2["discount"]=$_GET["discount"];                  
				$total = 0;
				$discount = (float) $_GET['discount'] / 100;
				$qty = $_GET['qty'];
				$price = $_GET['price'];
				$t = $price * $qty;
				$d = (float) $t * (float) $discount;
				$total = $t - $d;
				$product2["total"]=$total;			
				$product2["converted_total"]=round($total * (float) $currency);			
					
				$products[]=$product2;//add new product
				$pk_id = $this->bm->addList($product2);
				
				$_SESSION['orders']= json_encode($products);   

				echo "{\"recId\": \"" . $pk_id . "\"}";
			}
			else if( isset($dlist["updateList"]))    
			{
				$product2=array();
				$ProductID = $product2["id"] = $_GET["id"];
				$product2["product_category"]=$_GET["product_category"];			
				$product2["product"]=$_GET["product"];
				$product2["price"]=$_GET["price"]; 
				$product2["converted_price"]=round($_GET["price"] * (float) $currency);		
				$product2["qty"]=$_GET["qty"];                  
				$product2["discount"]=$_GET["discount"];

				$total = 0;
				$discount = (float) $_GET['discount'] / 100;
				$qty = $_GET['qty'];
				$price = $_GET['price'];
				$t = $price * $qty;
				$d = (float) $t * (float) $discount;
				$total = $t - $d;   
				$product2["total"]=$total;	
				$product2["converted_total"]=round($total * (float) $currency);			
				$products = json_decode($_SESSION['orders'], true);        
				foreach($products as $i => $product){
					if($product["id"] == $ProductID){            
						$products[$i] = $product2;
					}        
				}    
				$this->bm->updateList($product2, $_GET["id"]);

				$_SESSION['orders']= json_encode($products);    
				echo "{\"result\": \"success\"}";
			}
			else if( isset($dlist["deleteList"]))    
			{
				$ProductID = $_GET["id"];
				$products = json_decode($_SESSION['orders'], true);    
				foreach($products as $i => $product){
					if($product["id"] == $ProductID){            
						$this->bm->deleteList($ProductID);
						unset($products[$i]);
					}        
				}
				$_SESSION['orders']= json_encode($products);    
				echo "{\"result\": \"success\"}";
			}    
			else {
				$result = $this->bm->getOrders($booking_name);
				$total_Records = $this->bm->getOrdersCtr($booking_name);			
				$arr = array();
				$i = 0;
				foreach($result as $row) {
					$arr[$i]['id'] = $row->id;
					$arr[$i]['booking_name'] = $booking_name;
					$arr[$i]['product_category'] = $row->product_category; 	
					$arr[$i]['product'] = $row->product; 	
					$arr[$i]['price'] = number_format((float)$row->price, 2, '.', '');
					$arr[$i]['qty'] = $row->qty; 	
					$arr[$i]['discount'] = $row->discount; 	 
					$arr[$i]['bill'] = number_format((float)$row->total, 2, '.', '');
					$i++;
				}
				$json = json_encode($arr);
				$_SESSION['orders'] = $json;
				
				$sb = "{\"totalRecords\":" . $total_Records . ",\"curPage\":1,\"data\":".$json."}";
				
				echo $sb;
			}
		}
	}

	public function getOrders($booking_name = '')
	{		
	    $data = $this->bm->getOrders($booking_name);   
		$total_Records = $this->bm->getOrdersCtr($booking_name);
	    
		$arr = array();
		$i = 0;
		foreach($data as $key => $row) {
			$arr[$i]['id'] = $row->id;
			$arr[$i]['product_category'] = $row->product_category; 
			$arr[$i]['product'] = $row->product; 
			$arr[$i]['price'] = (float)$row->price; 
			$arr[$i]['converted_price'] = (float)$row->converted_price; 
			$arr[$i]['qty'] = $row->qty;			
			$arr[$i]['discount'] = $row->discount;
			$arr[$i]['bill'] = (float)$row->total; 
			$arr[$i]['converted_total'] = (float)$row->converted_total;
			$i++;
		}
		$json = json_encode($arr);
		$_SESSION['orders'] = $json;
		
	    //$sb = "{\"totalRecords\":" . $total_Records . ",\"curPage\":1,\"data\":".$json."}";
	    
		return $json;
	}

	public function getTotalBill($booking_name = '')
	{		
	    $data = $this->bm->getTotalBill($booking_name);   
		$array = array(
			'total' => (float) $data->total,
			'converted_total' => (float) $data->converted_total
		); 
		
		echo json_encode($array);
	}

	public function getOrderDetails()
	{	
		$booking_name = $_GET['booking_name'];
	    $data = $this->bm->getOrders($booking_name);   
		$total_Records = $this->bm->getOrdersCtr($booking_name);
	    
		$arr = array();
		$i = 0;
		foreach($data as $key => $row) {			
			$arr[$i]['id'] = $row->id; 
			$arr[$i]['booking_name'] = $booking_name; 
			$arr[$i]['product_category'] = $row->product_category; 
			$arr[$i]['product'] = $row->product; 
			$arr[$i]['price'] = round((float)$row->price); 
			$arr[$i]['converted_price'] = round((float)$row->converted_price); 
			$arr[$i]['qty'] = $row->qty;			
			$arr[$i]['discount'] = $row->discount;
			$arr[$i]['bill'] = round((float)$row->total); 
			$arr[$i]['converted_total'] = round((float)$row->converted_total); 
			$i++;
		}
		$json = json_encode($arr);
		$_SESSION['orders'] = $json;
		
	    $sb = "{\"totalRecords\":" . $total_Records . ",\"curPage\":1,\"data\":".$json."}";
	    
		echo $sb;
	}

	public function getProducts()
	{
		$product_cat = $this->bm->getProductCat();
		$products = $this->bm->getProducts();
		$arr = array();
		$arr_id = array();
		$price = array();
		$pid = array();
		$info = '';
		$i = 0;
		$ii = 0;
		
		foreach($products as $key => $row) {
			$arr[$row->product][$i] = $row->product_name;		
			$i++;
		}
		
		foreach($products as $key => $row) {			
			$price[$row->product][$ii] = $row->price; 				
			$ii++;
		}

		foreach($arr as $arr_key => $arr_val) {					
			$info[] = '{ product_category: "'.$arr_key.'", product: "'.implode('|', $arr_val).'", price: "'.implode('|', $price[$arr_key]).'"}';
		}

		return implode(', ', $info);				
	}

	public function add_form()
	{
		$year = $this->input->get('year');	
		$data['year'] = $year;
		$data['message'] = NULL;
		$data ['title'] = 'Add Booking';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Add Booking' => NULL
			);
		$data ['active'] = 'booking'.$year;		
		
		$data['last_booking'] =  $this->bm->getLastBookingNum($year);		
		$data['customers'] =  $this->bm->getCustomers();
		$data['company_year'] = $this->csm->get_company_year();	
		$data['currencies'] = $this->csm->get_currencies();

		$this->load->view('bmg/template/header', $data);
		$this->load->view('bmg/booking/insert');
		$this->load->view('bmg/template/footer');
	}

	public function insert()
	{	
		$config['upload_path'] = './uploads/booking/';
		$config['allowed_types'] = 'pdf';		
		$this->load->library('upload', $config);
		$file_name = '';
		$error = array();

		if(! empty($_FILES['userfile']['name'])) {
			if ( ! $this->upload->do_upload('userfile')) {
	            $error = array('error' => $this->upload->display_errors());
	            redirect('booking/index/add/0?year='.$this->input->post('year'), 'location', 301);	
	        } else {
	            $data = array('upload_data' => $this->upload->data());              
	            $file_name = $this->upload->data('file_name');              
	        }
	    }

		$param = array(
				'booking_name' => $this->input->post('booking_name'),
				'project_name' => $this->input->post('project_name'),
				'customer_id' => $this->input->post('customer_id'),
				'po_date' => $this->input->post('po_date'),
				'cust_po_num' => $this->input->post('cust_po_num'),
				'currency' => $this->input->post('currency'),
				'rate' => $this->input->post('rate'),
				'uploaded_file' => $file_name,
				'year' => $this->input->post('year')
			);
		$r = $this->bm->insert($param);
		
		redirect('booking/index/add/'.$r.'?year='.$this->input->post('year'), 'location', 301);		
	}

	public function update_form()
	{			
		$year = $this->input->get('year');	
		$data['message'] = NULL;
		$data ['title'] = 'Update Booking';
		$data['breadcrumbs'] = array(
				'Home' => base_url(),
				'Update Booking' => NULL
			);		
		$data ['active'] = 'booking'.$year;
		$data['data'] = $this->bm->getCustomer($this->input->get('id'));
		$data['company_year'] = $this->csm->get_company_year();	
		
		$this->load->view('bmg/template/header', $data);
		$this->load->view('bmg/booking/update');
		$this->load->view('bmg/template/footer');
	}

	public function update()
	{		
		$config['upload_path'] = './uploads/booking/';
		$config['allowed_types'] = 'pdf';		
		$this->load->library('upload', $config);
		$file_name = $this->input->post('old_file');
		$error = array();
		$id = $this->input->post('id');
		$year = $this->input->post('year');
		$booking_name = $this->input->post('booking_name');
		$old_rate = $this->input->post('old_rate');

		if(! empty($_FILES['userfile']['name'])) {
			if ( ! $this->upload->do_upload('userfile')) {
	            $error = array('error' => $this->upload->display_errors());
	            redirect('booking/get_specific?year='.$year.'&id='.$id, 'location', 301);	
	        } else {
	        	$path = 'uploads/booking/'.$this->input->post('old_file');
		        @unlink($path);

	            $data = array('upload_data' => $this->upload->data());              
	            $file_name = $this->upload->data('file_name');              
	        }
	    }
		$param = array(
				'project_name' => $this->input->post('project_name'),
				'customer_id' => $this->input->post('company'),
				'cust_po_num' => $this->input->post('cust_po_num'),
				'currency' => $this->input->post('currency'),
				'rate' => $this->input->post('rate'),
				'uploaded_file' => $file_name,
				'updated_at' => date('Y-m-d H:i:s')	
			);
		$r = $this->bm->update($id, $param);
		
		if($old_rate != $this->input->post('rate')) {
			$rate = (float) $this->input->post('rate');
			$data = $this->bm->getOrders($booking_name);   

			foreach($data as $key => $row) {			
				$converted_price = round((float) $row->price * $rate);
				$converted_total = round((float) $row->total * $rate);

				$params = array(
					'converted_price' => $converted_price,
					'converted_total' => $converted_total
				);

				$this->bm->updateOrderAmount($row->id, $params);
			}
		}

		redirect('booking/get_specific?year='.$year.'&id='.$id, 'location', 301);
	}

	public function delete()
	{
		$checked = $this->input->post('selected');
		$r = $this->bm->delete($checked);
		$r = ($r > 0 ? 1 : 0);
		
		redirect('booking/index/delete/'.$r, 'location', 301);
	}
}
