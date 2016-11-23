<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       /// if($this->session->userdata('is_admin'))
       //// {
       //     redirect(base_url('home'));
        //}
    }
    public function index()
	{
	   $this->db->order_by("Likes","desc");
	   $users=$this->db->get_where('users')->result();
        
	    $error="";
	    if($_POST)
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first', 'First Name', 'required');
            $this->form_validation->set_rules('last', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.Email]');
            $this->form_validation->set_rules('cemail', 'Email Confirmation', 'required|matches[email]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password Not match', 'required|matches[password]');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('age', 'Age', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('view_register');
            }
            else
            {
                $this->load->library('encrypt');
                $data=array(
                 'FirstName'=>$this->input->post('first'),
                 'LastName'=>$this->input->post('last'),
                 'Gender'=>$this->input->post('gender'),
                 'Age'=>$this->input->post('age'),
                 'Email'=>$this->input->post('email'),
                 'Password'=>md5($this->input->post('password')),
                 'Status'=>0,
                 'Image'=>$this->input->post('gender').'.jpg'
                 );
                 
                 $this->db->insert('users',$data);
                 $id = $this->db->insert_id();
                 
                 $encrypted_string =  base64_encode(urlencode($this->generateRandomString(60)));
                 
                 
                  if($this->db->affected_rows() > 0)
                {
                    $data = array('Secret'=>$encrypted_string);
                    $this->db->where('ID',$id);
                    $this->db->update('users',$data);
                    $this->load->library('email');
                    $this->email->set_mailtype("html");

                    $this->email->from('social@webeyeteaco.com', 'Social Sign Up');
                    $this->email->to($this->input->post('email'));
                   
                    $this->email->subject('Account Activation Email');
                    $this->email->message('<div style="padding-top: 1%; height: 400px; background-color: #f4f4f4; color: #1068BA;">
                                            <h1 align="Center" style="font-family:verdana;">Social Site</h1><div style=" text-align: center; padding-right: 3%; border: 1px solid #e4e4e4 ;padding-left: 3%; padding-top: 1%; height: 300px; width: 80%; margin-left: 8%; background-color: white; color: black;">
                                            <h2 style="color: #646464; font-size: 1.5em; font-family:verdana;">Hi '.$this->input->post('first').'You Are One Step Away!</h2>
                                            <div style="border: 0.1px solid #e4e4e4"></div>
                                            <p style="color: #646464; font-family:verdana;">Your Account is Almost Completed. Just Click Below Link To Activate Your Account.</p>
                            
                                            <p style="color: #646464; font-size: 1em; font-family:verdana;">You can Login anytime after Activating Your Account on this website <a href="'.base_url('login').'">'.base_url('login').'</a>. If you are facing some issues in Activating you can contact us at our email us or also on our facebook page.</p>
                                            <a href="'.base_url('login/activate/'.$this->input->post('email').'/'.$encrypted_string).'" target="_blank" style="background-color: #4a90e2; border: none; font-family:verdana; color: white; padding: 10px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;">ACTIVATE MY ACCOUNT</a><br>
                                            <p style="color: #646464; text-align: left; font-size: 0.8em; font-family:verdana;">'.base_url().'</p>
                                            </div>
                                            </div>');
                    
                    $this->email->send();
                    $error='<div class="alert alert-success">Your Account Has Been Created.Please Check Your Email To Activate Your Account</div>';
                    $this->session->set_flashdata('error',$error);
                    
                    redirect(base_url('login'));
                }
                else
                {
                    $error='<div class="alert alert-danger">Error. Email Address Already Exist</div>';
                }
                 
            }
        
        }
        
        $this->load->view('view_register',array('error'=>$error,'users'=>$users));
		
	}
    public function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

}
