<?php
class Booking_model extends CI_Model {
		private $company = 'bmg'; //change this with a session variable AS or BMG

        public function __construct()
        {	
        	parent::__construct();            
        }
		
		public function view($year)
        {            
            $sql = 'SELECT a.*, a.id AS ids, a.customer_id AS company, a.uploaded_file AS pdf            
                FROM '.$_SESSION['company'].'_booking a
                WHERE a.year=?
                ORDER BY a.id
              ';

            $query = $this->db->query($sql, array($year));            

            return $query->result();
        }

        public function getSpecificBooking($id)
        {            
            $sql = 'SELECT a.*
                FROM '.$_SESSION['company'].'_booking a
                WHERE a.id=?
                LIMIT 0, 1
              ';

            $query = $this->db->query($sql, array($id));            

            return $query->row();
        }

        public function getProductCat()
        {            
            $sql = '
                SELECT a.product
                FROM product_category a               
                ORDER BY a.product         
              ';

            $query = $this->db->query($sql);            

            return $query->result();
        }

        public function getProducts()
        {            
            $sql = '
                SELECT a.id, a.product, b.product_name, b.price, b.id AS pid
                FROM product_category a
                LEFT JOIN product b
                ON b.cat_id = a.id
                ORDER BY a.product         
              ';

            $query = $this->db->query($sql);            

            return $query->result();
        }

        public function getOrders($booking_name = '')
        {            
            $sql = '
                SELECT a.*, b.currency
                FROM '.$_SESSION['company'].'_order_details a
				LEFT JOIN '.$_SESSION['company'].'_booking b	
				ON a.booking_name = b.booking_name				
                WHERE a.booking_name=?
                ORDER BY a.id ASC
              ';
            $query = $this->db->query($sql, array($booking_name));            

            return $query->result();
        }

        public function getTotalBill($booking_name = '')
        {            
            $sql = '
                SELECT SUM(total) AS total, SUM(converted_total) AS converted_total
                FROM '.$_SESSION['company'].'_order_details           
                WHERE booking_name=?                
              ';
            $query = $this->db->query($sql, array($booking_name));            

            return $query->row();
        }

        public function getOrdersCtr($booking_name = '')
        { 
            $sql = '
                SELECT *
                FROM '.$_SESSION['company'].'_order_details           
                WHERE booking_name=?
              ';
            $query = $this->db->query($sql, array($booking_name));

            return $query->num_rows();
        }


        public function getLastBookingNum($year)
        {            
            $sql = 'SELECT booking_name FROM '.$_SESSION['company'].'_booking 
                WHERE year=?
                ORDER BY id DESC LIMIT 0, 1';
               
            $query = $this->db->query($sql, array($year));            

            if($query->num_rows() > 0) {
                return $query->row();
            } else {
                return 0;
            }
        }

        public function getCustomers()
        {            
            $sql = 'SELECT * FROM customers ORDER BY company';
            $query = $this->db->query($sql);            

            return $query->result();
        }

        public function getCustomer($id)
        {            
           $query = $this->db->get_where($_SESSION['company'].'_booking', array('id' => $id));                   

            return $query->row();
        }

        public function insert($data = array())
        {     
            $this->db->insert($_SESSION['company'].'_booking', $data); 
            
            return $this->db->affected_rows();
        }

        public function update($id = 0, $data = array())
        {     
            $this->db->where('id', $id);
            $this->db->update($_SESSION['company'].'_booking', $data);

            return $this->db->affected_rows();
        }

        public function updateOrderAmount($id = 0, $data = array())
        {     
            $this->db->where('id', $id);
            $this->db->update($_SESSION['company'].'_order_details', $data);

            return $this->db->affected_rows();
        }

        public function delete($data = array())
        {     
            $this->db->where_in('id', $data);
            $this->db->delete($_SESSION['company'].'_booking');
            
            return $this->db->affected_rows();
        }

        public function addList($addList)
        {                 
            $this->db->insert($_SESSION['company'].'_order_details', $addList);
			
			return $this->db->insert_id();
        }

        public function updateList($updateList, $id = 0)
        {
            $this->db->where('id', $id);
            $this->db->update($_SESSION['company'].'_order_details', $updateList);    
        }

        public function deleteList($ids)
        {	
			$this->db->where_in('id', $ids);
            $this->db->delete($_SESSION['company'].'_order_details');
			
			return $this->db->affected_rows();
        }
}