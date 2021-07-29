<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Ptk_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Ptk(){
        return $this->db->get('ptk')->result();
    }

    function find($id) {
        $this->db->where(['ptk.id_ptk'=> $id]);
        return $this->db->get('ptk')->row();
    }
}