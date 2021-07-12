<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Jurusan_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Jurusan($cari = null){
        $this->db->like('kd_jurusan', $cari);
        $this->db->or_like('nama_jurusan', $cari);
        $this->db->or_like('keterangan', $cari);
        return $this->db->get('jurusan');
    }
}