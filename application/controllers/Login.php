<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
    }
    public function index()
	{
	   $this->db->order_by("Likes","desc");
	   $users=$this->db->get_where('users')->result();
        
       $error="";
       if($_POST)
       {
           $this->form_validation->set_rules('email','Email','trim|required');
           $this->form_validation->set_rules('password','Password','required|MD5');
           
           $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
           
           
           if($this->form_validation->run() !== false)
           {
              $query=$this->db->get_where('users',array(
              'Email'=>$this->input->post('email'),
              'Password'=>$this->input->post('password')
              ));
              
              if($query->num_rows() > 0)
              {
                $data=$query->row();
                if($data->Status)
                {
                      $sdata=array(
                     'Login'=>true,
                     'ID'=>$data->ID,
                     'Email'=>$data->Email,
                     'Name'=>$data->FirstName.' '.$data->LastName
                     );
                    
                     $this->session->set_userdata($sdata);
                     
                     redirect(base_url());  
                }
                else
                {
                    $error='<div class="alert alert-danger">Your Account is Not Activated.</div>';
                }
                 
                 
              }
              else
              {
                $error='<div class="alert alert-danger">Invalid Email or Password.</div>';
              }
           }
       }
       
		$this->load->view('view_login',array('error'=>$error,'users'=>$users));
	}
    
     public function activate($email,$code)
	{
 
	   
	   $this->load->library('encrypt');
      
       $query=$this->db->get_where('users',array(
              'Secret'=>$code,
              'Email'=>$email
              ));
              
              if($query->num_rows() > 0)
              {
                $data = array('Status'=>1);
                $this->db->where('Email',$email);
                $this->db->update('users',$data);
                $error='<div class="alert alert-success">Your Account Has Been Activated</div>';
                $this->session->set_flashdata('error',$error);
                redirect(base_url('login'));
              }
              
              
             
	}
    
    
}
