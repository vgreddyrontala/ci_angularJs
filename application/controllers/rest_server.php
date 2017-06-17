<?php defined('BASEPATH') OR exit('No direct script access allowed');
	require_once APPPATH . 'libraries/REST_Controller.php';
 
class Example_api extends REST_Controller {
	public function index(){
		$this->load->helper('url');
		$this->load->view('rest_server');
    }
}
