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
	   $msg = '';
	   if($_FILES)
       {
        if ($this->do_upload('imgdp')) 
            {
                $msg = '<div class="alert alert-success">DP Successfully Updated</div>';
                $data = array('Image'=>$_FILES["imgdp"]["name"]);
                $this->db->where('ID',$this->session->userdata('ID'));
                $this->db->update('users',$data);
        
            } else 
            {
                $msg = '<div class="alert alert-danger">There are error in uploading image Please Try Again later</div>';
            }
        } 
      
       
	    $data=$this->db->get_where('users',array('ID'=>$this->session->userdata('ID')))->row();
        $this->db->order_by("Likes","desc");
        $users=$this->db->get_where('users')->result();
        
		$this->load->view('view_home',array('data'=>$data,'users'=>$users,'msg'=>$msg));
	}
    
     public function do_upload($img)
    {
            $config['upload_path']          = 'Template/img/dp';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload($img))
            {
                    return false;
            }
            else
            {
               //$_POST[$img]= $this->upload->data()['file_name'];
                    return true;
            }
    }
    
    
}
