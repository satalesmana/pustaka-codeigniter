<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller{
	function __construct() {
		parent::__construct();

		$this->load->model('Buku_model');	
    }

	public function index(){
		$content['content'] = "pengembalian/index";
		$this->load->view('app_view',$content);
	}

}