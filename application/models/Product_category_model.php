<?php
class Product_category_model extends CI_Model {

        public function __construct()
        {	
        	parent::__construct();            
        }
		
		public function view()
        {            
            $sql = 'SELECT * FROM product_category ORDER BY product ASC';
            $query = $this->db->query($sql);            

            return $query->result();
        }

        public function getProduct($id)
        {            
           $query = $this->db->get_where('product_category', array('id' => $id));                   

            return $query->row();
        }

        public function insert($data = array())
        {     
            $this->db->insert('product_category', $data); 
            
            return $this->db->affected_rows();
        }

        public function update($id = 0, $data = array())
        {     
            $this->db->where('id', $id);
            $this->db->update('product_category', $data);

            return $this->db->affected_rows();
        }

        public function delete($data = array())
        {     
            $this->db->where_in('id', $data);
            $this->db->delete('product_category');
            
            return $this->db->affected_rows();
        }
}