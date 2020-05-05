<?php

class Buku_model extends CI_Model{
	private $table = 'buku';
	public $buku = ['id'=>'','judul'=>'','pengarang'=>'', 'gambar'=>''];

    function add($data){
		$this->db->insert($this->table,$data);
    }
    
    function get(){
		$res = $this->db->get($this->table);
		return $res->result();
	}

	function getById($id){
		$buku = $this->db->from($this->table)
			->where('id',$id)
			->get();

		return current($buku->result());
    }
    
    function upate($data,$id){
		$this->db->where('id', $id);
		$this->db->update(
			$this->table,
			$data
		);
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
}