<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Pelanggaran_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Pelanggaran($cari = null){
        $this->db->like('kd_pelanggaran', $cari);
        $this->db->or_like('kategori_pelanggaran', $cari);
        $this->db->or_like('jenis_pelanggaran', $cari);
        $this->db->or_like('pelanggaran', $cari);
        $this->db->or_like('poin', $cari);
        $this->db->order_by('kd_pelanggaran', 'ASC');
        return $this->db->get('pelanggaran');
    }
}