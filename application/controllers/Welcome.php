<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
        public function __construct()
	{
        parent::__construct();
		$this->load->library('session');
		$this->load->database();
	    date_default_timezone_set("Asia/Kolkata");
	    $this->load->helper('url');
	    $this->load->model('Model');
	   
	   // Load form validation library
        $this->load->library('form_validation');
	   
	   // Load file helper
        $this->load->helper('file');
	}
	
	public function if_logged_in()
	{
		$session_id = $this->session->userdata('logged_in');
		if ($session_id == 'TRUE') {
		    return true;
		}
		else
		{
            $this->session->set_flashdata('error','You Have to login first ');
            redirect(base_url().'Welcome');
		}
	}
   
   
   
   public function logout()
	 {
	     $this->session->unset_userdata('logged_in');
	     redirect(base_url().'Welcome');
	 }
	 
	public function login()
	{

        $email=$this->input->post('email');
        $password=$this->input->post('password');

        if($this->Model->login($email,$password) != '')
        {   
            $this->db->where('id',$this->Model->login($email,$password));
            $cust = $this->db->get('users')->row();
            $session_data = array(
                'logged_in'=>'TRUE',
                'id' =>$cust->id,
                'email' =>$cust->email,
                'name' =>$cust->name,
            );
            //print_r($session_data);
            //exit();
            $this->session->set_userdata($session_data);
            redirect(base_url().'Welcome/task/'.$cust->id);
            // echo'yesa';
        }
        
        else
        {
             $this->session->set_flashdata('error','Login Failed! Email or Password is wrong');
            redirect(base_url().'Welcome/index');
            // echo 'not';
        }
        // print_r($session_data);

	}

	public function index()
	{
		$this->load->view('index.php');
	}
	
		public function register()
	{
		$this->load->view('register.php');
	}
	
	public function add_user()
	{
	    $this->db->where('email',$_POST['email']);
	    $query_get = $this->db->get("users");
	    if($query_get->num_rows() > 0){
	        
                        $this->session->set_flashdata('error','This Email id already registered, try another mail');
                        redirect(base_url().'Welcome/register');
	    }
	    else
	    {
	    $data = array(   
                        'name'    => $_POST['name'],  
                        'email'  => $_POST['email'],
                        'password'    => $_POST['password'],
                        );  
                        
                        $this->db->insert('users',$data);
                        redirect(base_url().'Welcome/register');
	    }
	}
	
		public function task($id)
	{
	    $this->db->where('id',$id);
	    
	    if($this->db->get('users')->num_rows() == 0){
	       echo 'User Not Exist';
	    }
	    else{
	        
	    $data = array('id'=>$id);
	    
	    $this->if_logged_in();
		$this->load->view('task',$data);
	    }
	}
	
	public function add_task()
	{
	    
	    $my_id=$this->input->post('user_id');
	    
	    $data = array(   
                        'task'    => $_POST['task'], 
                        'user_id'    => $_POST['user_id'],
                        // 'created_at' =>date("Y-m-d h:i:s A"),
                        
                        'created_at' =>date('d M Y').' '.date("h:i a"),
                        );  
                        
                        // $this->db->where('id',$id );
                        $this->db->insert('todos',$data);
                        redirect(base_url().'Welcome/task/'.$my_id);
	}

	
	/*----------Delete section Start Here-------*/
	public function delete_task($id)
    {
        $this->db->where('id',$id);
    	$this->db->delete('todos');
    		
    	redirect(base_url().'Welcome/task/'.$this->session->userdata('id'));
    }
    /*----------Delete section End Here-------*/
	
	function import()
     {
        //  $my_id=$this->input->post('user_id');
         $this->load->library('CSVReader');
      $file_data = $this->csvreader->parse_csv($_FILES['csv_file']['tmp_name']);
       
      foreach($file_data as $row)
      {
       $data[] = array(
        'task' => $row["task"],
        'user_id'    => $_POST['user_id'],
        'created_at' =>date('d M Y').' '.date("h:i a"),
       );
      }
      

      $this->Model->insert($data);
        redirect('Welcome/task/'.$this->session->userdata('id'));
     }

}
