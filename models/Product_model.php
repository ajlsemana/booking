<?php
class Product_model extends CI_Model {
		private $company = 'bmg'; //change this with a session variable AS or BMG

        public function __construct()
        {	
        	parent::__construct();            
        }
		
		public function view()
        {            
            $sql = 'SELECT a.*, b.product AS category
            FROM '.$_SESSION['company'].'_product a
            LEFT JOIN '.$_SESSION['company'].'_product_category b
            ON b.id = a.cat_id
            ORDER BY category ASC';
            $query = $this->db->query($sql);            

            return $query->result();
        }

        public function get_product_cat()
        {            
            $sql = 'SELECT * FROM '.$_SESSION['company'].'_product_category ORDER BY product ASC';
            $query = $this->db->query($sql);            

            return $query->result();
        }

        public function getProduct($id)
        {            
           $query = $this->db->get_where($_SESSION['company'].'_product', array('id' => $id));                   

            return $query->row();
        }

        public function insert($data = array())
        {     
            $this->db->insert($_SESSION['company'].'_product', $data); 
            
            return $this->db->affected_rows();
        }

        public function update($id = 0, $data = array())
        {     
            $this->db->where('id', $id);
            $this->db->update($_SESSION['company'].'_product', $data);

            return $this->db->affected_rows();
        }

        public function delete($data = array())
        {     
            $this->db->where_in('id', $data);
            $this->db->delete($_SESSION['company'].'_product');
            
            return $this->db->affected_rows();
        }
}