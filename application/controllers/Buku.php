<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller{
	function __construct() {
		parent::__construct();
		
    }

    function index(){
		$content['content'] = "buku/table";
		$this->load->view('app_view',$content);
    }

    function form(){
		$content['content'] = "buku/form";
		$this->load->view('app_view',$content);
    }
}
