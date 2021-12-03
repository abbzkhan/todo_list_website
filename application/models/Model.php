<?php
class Model extends CI_Model {
	public function __construct()
	{
	   $this->load->database();  
	}
	
	public function login($email,$password)
	{
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {
            return $query->row()->id;
        }
    }

    function get_task(){
          $this->db->select('*');
          $row = $this->db->get('todos');
          return $row->result();
      }
      
      function insert($data)
     {
      $this->db->insert_batch('todos', $data);
     }
      
}