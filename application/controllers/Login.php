<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	function __construct() {
		parent::__construct();
    }

    public function index(){
        $this->load->view('login');
    }

    public function submit(){
        $this->load->model('Login_model');

        $auth = $this->Login_model->cek_auth([
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
        ]);

        if($auth)
            redirect('app');
    }

    public function message(){
        $content['content'] = "login_permit";
		$this->load->view('app_view',$content);
    }

    public function logout(){
        session_destroy();
        $this->session->sess_destroy();
        redirect('login');
    }

}