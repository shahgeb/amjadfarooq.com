<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('Login'))
        {
            redirect(base_url('login'));
        }
    }
    public function index()
	{
	    $data=$this->db->get_where('users',array('ID'=>$this->session->userdata('ID')))->row();
        $this->db->order_by("Likes","desc");
        $users=$this->db->get_where('users')->result();
        
		$this->load->view('view_home',array('data'=>$data,'users'=>$users));
	}
    
    
}
