<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Sanksi_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Sanksi($cari = null){
        $this->db->like('kd_sanksi', $cari);
        $this->db->or_like('kategori_sanksi', $cari);
        $this->db->or_like('jenis_sanksi', $cari);
        $this->db->or_like('total_poin', $cari);
        $this->db->order_by('kd_sanksi', 'ASC');
        return $this->db->get('sanksi');
    }
}