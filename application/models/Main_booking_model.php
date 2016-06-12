<?php
class Main_booking_model extends CI_Model {

        public function __construct()
        {	
        	parent::__construct();            
        }
		
		public function view($year)
        {            
            $sql = 'SELECT a.*, a.id AS ids, a.customer_id AS company, a.uploaded_file AS pdf            
                FROM '.$_SESSION['company'].'_booking a
                WHERE a.year=?
                ORDER BY a.booking_name
              ';

            $query = $this->db->query($sql, array($year));            

            return $query->result();
        }

        public function getTotalPerBooking($year)
        {    
            $data = array();        
            $sql = 'SELECT a.booking_name, SUM(c.total) AS total_value    
                    FROM '.$_SESSION['company'].'_booking a
                    LEFT JOIN '.$_SESSION['company'].'_order_details c
                    ON c.booking_name = a.booking_name
                    WHERE a.year=?
                    GROUP BY a.booking_name
                ';

            $query = $this->db->query($sql, array($year));            
            
            foreach($query->result() as $row) {
                $data[$row->booking_name] = (float) $row->total_value;
            }

            return $data;
        }
}