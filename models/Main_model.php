<?php
class Main_model extends CI_Model {
		private $company = 'bmg'; //change this with a session variable AS or BMG

        public function __construct()
        {	
        	parent::__construct();            
        }
		
		public function get_product_cat_year($year)
        {            
            $sql = 'SELECT * FROM '.$_SESSION['company'].'_product_category WHERE year=? ORDER BY product ASC';
            $query = $this->db->query($sql, array($year));            

            return $query->result();
        }    
}