<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }
    public function index()
	{
	   if(!$this->session->userdata('Login'))
        {
            redirect(base_url('login'));
        }
        $error ='';
	    $dataa=$this->db->get_where('users',array('ID'=>$this->session->userdata('ID')))->row();
        
            if($_POST)
            {
                
                $this->load->library('form_validation');
                $this->form_validation->set_rules('first', 'First Name', 'required');
                $this->form_validation->set_rules('last', 'Last Name', 'required');
                $this->form_validation->set_rules('password', 'Password', '');
                $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_rules('age', 'Age', 'required');
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
                if ($this->form_validation->run() != FALSE)
                { 
                    $pass = $this->input->post('password');
                    if(isset($pass))
                    {
                        $data=array(
                         'FirstName'=>$this->input->post('first'),
                         'LastName'=>$this->input->post('last'),
                         'Gender'=>$this->input->post('gender'),
                         'Age'=>$this->input->post('age'),
                         'Email'=>$this->input->post('email'),
                         'Password'=>md5($this->input->post('password')),
                         'Image'=>$this->input->post('gender').'.jpg'
                         );
                    }
                    else
                    {
                        $data=array(
                         'FirstName'=>$this->input->post('first'),
                         'LastName'=>$this->input->post('last'),
                         'Gender'=>$this->input->post('gender'),
                         'Age'=>$this->input->post('age'),
                         'Email'=>$this->input->post('email'),
                         'Image'=>$this->input->post('gender').'.jpg'
                         );
                    }
                    
                    
                    $this->db->where('ID',$this->session->userdata('ID'));
                    $this->db->update('users',$data);
                    $error='<div class="alert alert-success">Information Has Been Updated !</div>';
                    $this->session->set_flashdata('error',$error);
                    
                    redirect(base_url('profile'));
                    
                }
            }
         
        
		$this->load->view('view_edit_profile',array('data'=>$dataa,'error'=>$error));
	}
    public function picture()
	{
	   var_dump($_POST);
    }
    public function like($id)
	{
	   $ip = $this->ipCheck();
       
       $query=$this->db->get_where('Likes',array('User_ID'=>$id,'IP'=>$ip));
       if($query->num_rows() > 0)
       {
         echo 'false';
       }
       else
       {
         $this->db->insert('Likes',array('User_ID'=>$id,'IP'=>$ip));
         $this->db->where('ID',$id);
         $this->db->update('users',array('Likes'=>$query->row()->Likes+1));
         
         echo 'true';
       }
       
    }
    function ipCheck() {
		if (getenv('HTTP_CLIENT_IP')) {
			$ip = getenv('HTTP_CLIENT_IP');
		}
		elseif (getenv('HTTP_X_FORWARDED_FOR')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_X_FORWARDED')) {
			$ip = getenv('HTTP_X_FORWARDED');
		}
		elseif (getenv('HTTP_FORWARDED_FOR')) {
			$ip = getenv('HTTP_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_FORWARDED')) {
			$ip = getenv('HTTP_FORWARDED');
		}
		else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
    
    
}
