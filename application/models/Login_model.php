<?php

class Login_model extends CI_Model{
    private $table = 'users';

    public function cek_auth($filter){
        $res = $this->db->from($this->table)->where($filter)->get();

        if($res->num_rows()>0){
            $data = $res->result();

            $this->session->set_userdata([
                'username'=>$data[0]->username,
                'level'=>$data[0]->level
            ]);

            return true;
        }else
            return false;
    }
}