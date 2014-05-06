<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class verifyloginshipping extends CI_Controller 
{

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('User','',TRUE);
	 
	 }

	 function index()
	 {
		
	   //This method will have the credentials validation
	   $this->load->library('form_validation');
		
	   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.&nbsp; User redirected to login page
		 //echo ('434343');
		 $this->load->view('loginshipping');
	   }
	   else
	   {
			 //Go to private area
			// redirect('loginShipping', 'refresh');
			$username = $this->input->post('username');
			$password = $this->input->post('password');

		   //query the database
		   $result = $this->User->login($username, $password);

		   if($result)
		   {
				$sess_array = array(
				 'id' => $result->id,
				 'username' => $result->username,
				 'classId' => $result->classId
			   );
			   $this->session->set_userdata($sess_array);
			
				if($result->classId == 1)
				{
					$this->load->view('shipping');
				}
				else if($result->classId == 2)
				{
					$this->load->view('transporter');
				}
			
				 return TRUE;
		   }
		   else
		   {
		    
			 $this->form_validation->set_message('check_database', 'Invalid username or password');
			 	 
			 $this->load->view('errorloginshipping');
			 //echo ('5555');
			 return false;
		   }
	   }
	}

}
?>
