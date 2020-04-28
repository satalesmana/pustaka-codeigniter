<?php defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller{
	
	function index(){
		
		$this->load->view('app_view');
	}
	

}