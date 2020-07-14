<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->model('Member_model');
	}

	public function index(){
		$member = $this->Member_model->get();
		
		$content['data'] = $member;

		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
			&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

			echo json_encode($content);
		}else{
			$content['content'] = "member/table";
			$this->load->view('app_view',$content);
		}
					
	}

	public function form(){
		$member = json_decode(json_encode($this->Member_model->member));
		$id 	= $this->uri->segment(3);

		if($id !=''){
			$member = $this->Member_model->getById($id);
		}
	
		$content['content'] = "member/form";
		$content['member'] = $member;
		$this->load->view('app_view',$content);
	}

	public function delete(){
		$id = $this->uri->segment(3);
		$this->Member_model->delete($id);
		redirect('member');
	}

	public function submit(){
		$member = json_decode(json_encode($this->input->post()));

		if($member->id !='')
			$this->Member_model->upate($member,$member->id);
		else
			$this->Member_model->add($member);
		
		redirect('member');
	}


}