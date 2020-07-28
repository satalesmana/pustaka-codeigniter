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
	
	public function getlist(){
		$this->load->model('Peminjaman_model');

		$result =[
			"draw"=> $this->input->get('draw'),
			"recordsTotal"=> 1,
			"recordsFiltered"=> 1,
			"data"=> $this->Peminjaman_model->get()
		];

		echo json_encode($result);
	}

	public function add(){
		$this->load->library('Auto_number');
		$this->load->model('Peminjaman_model');

		$config['id'] = $this->Peminjaman_model->getLastId();
		$config['awalan'] = '';
        $config['digit'] = 4;
		$this->auto_number->config($config);
		$idpinjam = $this->auto_number->generate_id();

		//insert data to table header
		$this->Peminjaman_model->add_header([
			'idpinjam'=>$idpinjam,
			'idpeminjam'=>$this->input->post('peminjam'),
			'tglpinjam'=>$this->input->post('tglpinjam'),
			'tglkembali'=>$this->input->post('tglkembali'),
			'status'=>0
		]);
		
		//persiapan data ketable detail
		$detail_post = $this->input->post('detail');
		$detail_data = [];
		foreach($detail_post as $key=>$row){
			//$detail_data[$key]['id'] = $key;
			$detail_data[$key]['idpinjam'] = $idpinjam;
			$detail_data[$key]['idbuku'] = $row['id'];
			$detail_data[$key]['qty'] = $row['jml'];
		}

		//insert data ketable detail
		$this->Peminjaman_model->add_detail($detail_data);

		echo json_encode([
			'messages'=>'data berhasil disimpan'
		]);
	}

	
	

}