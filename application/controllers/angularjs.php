<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Angularjs extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this->load->model('countries_m');
		
	} 
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function get_alldata()
	{
		$this->load->view('welcome_message');
	}
	public function example()
	{
		$this->load->view('header');
		$this->load->view('example_v');
		$this->load->view('footer');
	}
	
	public function get_countries(){
		
		$res = $this->countries_m->get_countries_list();
		echo json_encode($res);exit;
	}
	
	public function get_c(){
		
	
		echo $res = $this->countries_m->card();
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */