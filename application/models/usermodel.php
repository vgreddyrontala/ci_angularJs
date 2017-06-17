<?php
class Usermodel extends CI_Model 
{

function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	
  public function get_category_list(){
	 $this->db->where('userid',$this->session->userdata['userid']);
	$query = $this->db->get('category');
     if($query->num_rows > 0 ){
	 return $query->result_array();
	
	}
  }
  public function add_category(){
	 $data = array(
	   'category_name' => $this->input->post('categoryname') ,
	   'userid' => $this->session->userdata['userid'] 
	);

	$this->db->insert('category', $data); 
	return $this->db->insert_id();
  }
  public function add_email(){
	 $data = array(
	   'categoryid' => $this->input->post('categoryid') ,
	   'emailid' => $this->input->post('emailid') ,
	   'userid' => $this->session->userdata['userid'] 
	);

	$this->db->insert('emails', $data); 
	return $this->db->insert_id();
  }
  public function get_email_list($categoryid=null){
	  if($categoryid !=null){
		   $this->db->where('ue.categoryid',$categoryid);
	  }
	 $this->db->where('ue.userid',$this->session->userdata['userid']);
	 $this->db->join('category c', 'ue.categoryid = c.category_id', 'left');
	$query = $this->db->get('emails ue');
     if($query->num_rows > 0 ){
	 return $query->result_array();
	
	}
  }
  public function login_check(){
	  $this->db->where('username',$this->input->post('username'));
	  $this->db->where('password',$this->input->post('password'));
	$query = $this->db->get('users');
     if($query->num_rows > 0 ){
	 return $query->row_array();
	
	}
  }
  function card(){
   echo "model";
  }
}