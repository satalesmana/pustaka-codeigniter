<?php

class Member_model extends CI_Model{
	private $table = 'member';
	public $member = ['id'=>'','nim'=>'','nama'=>'', 'telpon'=>'', 'alamat'=>''];

	function get(){
		$res = $this->db->get($this->table);
		return $res->result();
	}

	function getById($id){
		$member = $this->db->from($this->table)
			->where('id',$id)
			->get();

		return current($member->result());
	}

	function add($data){
		$this->db->insert($this->table,$data);
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