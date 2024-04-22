<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
	}
	public function index()
	{
		
		$this->load->view('admin_area/login');
		
	}

	public function login_check(){
		$email=$this->input->post('email');
		$password=$this->input->post('password');

		$pass=md5($password);

		$sql="SELECT COUNT(*) as count ,slno,username,email FROM registration WHERE email='$email' AND password='$pass' ";
        $result=$this->db->query($sql);
        $result=$result->row();
        if($result->count>0)
        {
            $data= array(
                'username'  => $result->username,
                'logged_in' => $result->slno,
				'email'     => $result->email,

            );

            $this->session->set_userdata($data);
            
            echo 'success';
        }
        else{
            echo 'user not exist';
        }
	}
	


	public function logout(){

		$this->session->sess_destroy();

		redirect('welcome');
       
	
	}


	
}
