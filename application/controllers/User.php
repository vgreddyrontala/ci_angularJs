<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	

function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this->load->model('usermodel');
		
	} 
	
	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{
		//print_r($this->input->post());
		$login_check = $this->usermodel->login_check();
		if(count($login_check) >0){
		$newdata = array(
        'username'  => $login_check['username'],
        'email'     => $login_check['password'],
		'userid'    => $login_check['userid'],
        'logged_in' => TRUE);

		$this->session->set_userdata($newdata);
		$data['list']=$this->usermodel->get_category_list();
		$this->load->view('category',$data);
		}else{
			redirect('user');
		}
	}
	public function addcategory() 
	{
		$this->load->view('addcategory');
	}
	public function categorylist()
	{
		$this->usermodel->add_category();
		$data['list']=$this->usermodel->get_category_list();
		$this->load->view('category',$data);
	}
	
	public function addemailform() 
	{
		$data['list']=$this->usermodel->get_category_list();
		$this->load->view('addemailform',$data);
	}
	public function addemail() 
	{
		$this->usermodel->add_email();
		redirect('user/email_list');
		
	}
	public function email_list() 
	{
		
		$data['list']=$this->usermodel->get_email_list();
		$this->load->view('emaillist',$data);
	}
	public function send_mailform() 
	{
		
		$data['list']=$this->usermodel->get_category_list();
		$this->load->view('sendmail_form',$data);
	}
	public function send_mail() 
	{
		$categoryid = $this->input->post('categoryid');
		$list=$this->usermodel->get_email_list($categoryid);
		//print_r($list);
		echo "Mail sent success to <br>";
		if(isset($list) && !empty($list)){
    foreach($list as $key=> $category){ 
     echo ($key+1).") ". $category['emailid']."<br>"; 
    
     }}
	 echo '<br><a href="'.base_url().'user/email_list">Email list</a>';
	}
	public function logout()
	{
		$array_items = array(
        'username'  => '',
        'email'     => '',
		'userid'    => '',
        'logged_in' => '');

		$this->session->unset_userdata($array_items);
		redirect('user');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */