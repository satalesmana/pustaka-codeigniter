<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam extends CI_Controller{
	function __construct() {
		parent::__construct();

		$this->load->model('Buku_model');	
    }

    function index(){
		$content['content'] = "pinjam/form";
		$this->load->view('app_view',$content);
    }

}