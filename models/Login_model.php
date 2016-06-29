<?php
class Login_model extends CI_Model {
		private $company = 'bmg'; //change this with a session variable AS or BMG

        public function __construct()
        {	
        	parent::__construct();            
        }
		
		public function authenticate($email, $password)
        {            
            $sql = 'SELECT * FROM bmg_users WHERE email=? AND password=? LIMIT 0,1';
            $query = $this->db->query($sql, array($email, md5($password)));            

            return $query->row();
        }    
}