<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Kelas_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Tahun($cari = null){
        $this->db->like('kd_tahun', $cari);
        $this->db->or_like('tahun_ajaran', $cari);
        $this->db->order_by('kd_tahun', 'DESC');
        return $this->db->get('tahun');
    }

    function get_Kelas(){
        $this->db->join('jurusan', 'kelas.jurusan_id = jurusan.id_jurusan');
        return $this->db->get('kelas')->result();
    }

    function find($id) {
        $this->db->join('jurusan', 'kelas.jurusan_id = jurusan.id_jurusan');
        return $this->db->get_where('kelas', ['id_kelas' => $id])->row();
    } 
}