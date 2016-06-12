<?php
class Company_settings_model extends CI_Model {
		private $company = 'bmg'; //change this with a session variable AS or BMG

        public function __construct()
        {	
        	parent::__construct();            
        }
		
		public function get_company_year()
        {
            $sql = 'SELECT * FROM '.$_SESSION['company'].'_year ORDER BY year DESC';
            $query = $this->db->query($sql);

            return $query->result();
        }

        public function get_currencies()
        {
            $sql = 'SELECT * FROM currencies ORDER BY name';
            $query = $this->db->query($sql);

            return $query->result();
        }

        public function get_distinct_year($year = 0)
        {
            $sql = 'SELECT * FROM '.$_SESSION['company'].'_year WHERE year=?';
            $query = $this->db->query($sql, array($year));

            return $query->num_rows();
        }

        public function insert_company_year($data = array())
        {     
            $this->db->insert($_SESSION['company'].'_year', $data); 
            
            return $this->db->affected_rows();
        }

        public function delete_year($data = array())
        {     
            $this->db->where_in('year', $data);
            $this->db->delete($_SESSION['company'].'_year');
            
            return $this->db->affected_rows();
        }
}