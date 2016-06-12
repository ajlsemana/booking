<?php
class Main_model extends CI_Model {

        public function __construct()
        {	
        	parent::__construct();            
        }
		
		public function get_product_cat_year($year)
        {            
            $sql = 'SELECT * FROM product_category WHERE year=? ORDER BY product ASC';
            $query = $this->db->query($sql, array($year));            

            return $query->result();
        }    
}