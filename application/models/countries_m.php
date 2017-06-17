<?php
class Countries_m extends CI_Model 
{

function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	
  public function get_countries_list(){
	$query = $this->db->get('m_country');
     if($query->num_rows > 0 ){
	 return $query->result();
	
	}
  }
  function card(){
   echo "model";
  }
}