<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if ( is_logged_in())
		{
			redirect('home',true);
		}

	}
	
	function index()
	{
		$this->load->helper(array('form'));


		$this->load->view('templates/header');
		$this->load->view('login_view');
		$this->load->view('templates/footer');
	}


}

?>
