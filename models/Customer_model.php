<?php
class Customer_model extends CI_Model {
		private $company = 'bmg'; //change this with a session variable AS or BMG

        public function __construct()
        {	
        	parent::__construct();            
        }
		
		public function view()
        {            
            $sql = 'SELECT * FROM '.$_SESSION['company'].'_customers ORDER BY company';
            $query = $this->db->query($sql);            

            return $query->result();
        }

        public function getCustomer($id)
        {            
           $query = $this->db->get_where($_SESSION['company'].'_customers', array('id' => $id));                   

            return $query->row();
        }

        public function insert($data = array())
        {     
            $this->db->insert($_SESSION['company'].'_customers', $data); 
            
            return $this->db->affected_rows();
        }

        public function update($id = 0, $data = array())
        {     
            $this->db->where('id', $id);
            $this->db->update($_SESSION['company'].'_customers', $data);

            return $this->db->affected_rows();
        }

        public function delete($data = array())
        {     
            $this->db->where_in('id', $data);
            $this->db->delete($_SESSION['company'].'_customers');
            
            return $this->db->affected_rows();
        }
}