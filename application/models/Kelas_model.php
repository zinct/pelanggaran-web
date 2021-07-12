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

    function get_Kelas($cari = null){
        $this->db->like('kelas.kd_kelas', $cari);
        $this->db->or_like('kelas.kd_jurusan', $cari);
        $this->db->or_like('kelas.nama_kelas', $cari);
        $this->db->or_like('kelas.kd_tahun', $cari);
        $this->db->join('jurusan','kelas.kd_jurusan=jurusan.kd_jurusan');
        $this->db->join('tahun','kelas.kd_tahun=tahun.kd_tahun');
        $this->db->order_by('kelas.kd_tahun', 'DESC');
        $this->db->order_by('kelas.kd_jurusan', 'ASC');
        return $this->db->get('kelas');
    }
}