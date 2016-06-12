<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_booking extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		if(! isset($_SESSION['info']['uid'])) {
			redirect('login', 'location', 301);
		}
		
		//Always get BMG 2015, 2016 to display on left sidebar etc..
		$this->load->model('company_settings_model', 'csm');
		$this->load->model('booking_model', 'bm');	

		$this->load->model('main_booking_model', 'mbm');	
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
		$data['data'] = $this->mbm->view($year);		
		$data['company_year'] = $this->csm->get_company_year();

		$this->load->view('template/header', $data);
		$this->load->view('booking/list');
		$this->load->view('template/footer');
	}

	public function getBookingList($year) {
		$data = $this->mbm->view($year);
		$total_val = $this->mbm->getTotalPerBooking($year);
		$i = 0;

		foreach($data as $row) {
			$qry_string = '?year='.$year.'&id='.$row->id;
			$link = site_url('booking/get_specific'.$qry_string);	
			#$arr[$i]['booking_name'] = '<a href="#" style="color: #367FA9;" id="'.$row->booking_name.'" onclick="open_popup(this.id);">'.$row->booking_name.'</a>'; 			
			$arr[$i]['booking_name'] = '<a href="'.$link.'" style="color: #367FA9;" id="'.$row->booking_name.'">'.$row->booking_name.'</a>'; 			
			$arr[$i]['project_name'] = $row->project_name; 			
			$arr[$i]['company'] = $row->company; 			
			$arr[$i]['po_date'] = date('d-m-Y', strtotime($row->po_date)); 			
			$arr[$i]['total_value'] = round($total_val[$row->booking_name]);
			$i++;
		}
		$json = json_encode($arr);
	    $sb = "{\"data\":".$json."}";
	    
		echo $sb;
	}

	public function add_form($year)
	{
		$data['last_booking'] =  $this->bm->getLastBookingNum($year);		
		$data['customers'] =  $this->bm->getCustomers();
		$data['company_year'] = $this->csm->get_company_year();	
		$data['currencies'] = $this->csm->get_currencies();
		$data['year'] = $year;
		#$this->load->view('template/header', $data);
		$this->load->view('booking/insert', $data);
		#$this->load->view('template/footer');
	}
}
