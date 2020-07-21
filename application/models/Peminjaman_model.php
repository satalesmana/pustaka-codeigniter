<?php

class Peminjaman_model extends CI_Model{
    private $table_header = 'peminjaman_header';
    private $table_detail = 'peminjaman_detail';

    public function add_header($data)
    {
        $this->db->insert($this->table_header,$data);
    }

    public function add_detail($data)
    {
        $this->db->insert_batch($this->table_detail,$data);
    }

    function getLastId(){
        $peminjaman = $this->db->from($this->table_header)
            ->order_by('idpinjam', 'DESC')
            ->limit(1)
			->get();
        return current($peminjaman->result())->idpinjam;
    }
}