<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller{
	function __construct() {
		parent::__construct();

		$this->load->model('Buku_model');	
    }

    function index(){
		$content['data']	= $this->Buku_model->get();
		$content['content'] = "buku/table";
		$this->load->view('app_view',$content);
    }

    function form(){
		$buku = json_decode(json_encode($this->Buku_model->buku));
		$id 	= $this->uri->segment(3);

		if($id !=''){
			$buku = $this->Buku_model->getById($id);
		}
	
		$content['buku'] = $buku;
		$content['content'] = "buku/form";
		$this->load->view('app_view',$content);
	}
	
	public function submit(){
		$buku = json_decode(json_encode($this->input->post()));
		$upload_stat = true;

		if(is_uploaded_file($_FILES['gambar']['tmp_name'])){
			$config['upload_path']          = './upload/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 8000;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				$content['content'] = "buku/form";
				$content['eror'] = $this->upload->display_errors();
				$content['buku'] = $buku;

				$this->load->view('app_view',$content);
				$upload_stat = false;
			}else{
				$upload_data = $this->upload->data();
				
				$buku->gambar = base_url()."/upload/".$upload_data['file_name'];
			}
		}

		if($upload_stat){
			if($buku->id !='')
				$this->Buku_model->upate($buku,$buku->id);
			else
				$this->Buku_model->add($buku);

			redirect('buku');
		}
	}

	public function delete(){
		$id = $this->uri->segment(3);
		$this->Buku_model->delete($id);
		redirect('buku');
	}
}
