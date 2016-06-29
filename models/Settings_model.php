<?php
class Settings_model extends CI_Model {
		private $company = 'bmg'; //change this with a session variable AS or BMG

        public function __construct()
        {	
        	parent::__construct();            
        }
		
		public function get_currencies()
        {
            $sql = 'SELECT * FROM '.$_SESSION['company'].'_currencies ORDER BY name ASC';
            $query = $this->db->query($sql);            

            return $query->result();
        }

        public function get_currency($id = 0)
        {
            $query = $this->db->get_where($_SESSION['company'].'_currencies', array('id' => $id));            

            return $query->row();
        }

        public function insert_currencies($data = array())
        {     
            $this->db->insert($_SESSION['company'].'_currencies', $data); 
            
            return $this->db->affected_rows();
        }

        public function update_currencies($id = 0, $data = array())
        {     
            $this->db->where('id', $id);
            $this->db->update($_SESSION['company'].'_currencies', $data);

            return $this->db->affected_rows();
        }

        public function delete_currencies($data = array())
        {     
            $this->db->where_in('id', $data);
            $this->db->delete($_SESSION['company'].'_currencies');
            
            return $this->db->affected_rows();
        }
}