<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Pelanggaran_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Pelanggaran(){
        $this->db->join('jenis_pelanggaran', 'pelanggaran.id_jenis_pelanggaran = jenis_pelanggaran.id_jenis_pelanggaran');
        $this->db->join('kategori_pelanggaran', 'jenis_pelanggaran.id_kategori_pelanggaran = kategori_pelanggaran.id_kategori_pelanggaran');
        return $this->db->get('pelanggaran')->result();
    }
}