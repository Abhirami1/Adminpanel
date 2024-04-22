<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('logged_in'))
        {

        }
        else{
            redirect(base_url()); 

        }
    }


public function home(){

    $this->load->view('admin_area/header');
    $this->load->view('admin_area/index');
    $this->load->view('admin_area/footer');
}
public function myprofile(){

   $this->load->view('admin_area/header');
    $this->load->view('admin_area/myprofile');
     $this->load->view('admin_area/footer');
}



public function user_details()
{
    $sql="SELECT * FROM address_details ";
    $result=$this->db->query($sql);
    $data['data']=$result->result();


    $this->load->view('admin_area/header');
    $this->load->view('user_details',$data);
     $this->load->view('admin_area/footer');

}



public function change_password()
{
    $this->load->view('admin_area/header');
    $this->load->view('admin_area/change_password');
    $this->load->view('admin_area/footer');

}

public function check_pass() {
    $pass = $this->input->post('oldpassword');
    $password = md5($pass); // Assuming your passwords are stored as MD5 hashes

    // Query the database for the password
    $query = $this->db->where('password', $password)->get('registration');
    $result = $query->row();

    // Return true if a matching record was found, false otherwise
    if ($result) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}


public function changed_password_user()
{
    $this->load->library('email');
    $password=$this->input->post('password');
    $newpassword=md5($password);

    $id=$this->session->userdata('logged_in');

    $sql="SELECT * FROM registration WHERE slno='$id' ";
    $result=$this->db->query($sql);
    $data = $result->row();
    $useremail=$data->email;

    $data=array(

        'password' => $newpassword,
    );


    $this->db->where('slno', $id);
    $updateSuccess= $this->db->update('registration', $data);

    if ($updateSuccess) {
        
        $this->email->from('abhiramipr30@gmail.com', 'Admin');
        $this->email->to($useremail);
        $this->email->subject('Password Change Confirmation');
        $this->email->message('Dear user, your password has been successfully changed.');

        // Attempt to send the email
        if ($this->email->send()) {
            // Email sent successfully
            echo json_encode(['success' => true, 'message' => 'Password updated successfully and confirmation email sent']);
        } else {
            // Email failed to send
            echo json_encode(['success' => true, 'message' => 'Password updated successfully but confirmation email failed to send']);
        }
    } else {
        // Password update failed
        echo json_encode(['success' => false, 'message' => 'Failed to update password']);
    }


}






















}