<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Sanksi_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Sanksi(){
        $this->db->join('kategori_sanksi', 'sanksi.kategori_sanksi_id = kategori_sanksi.id_kategori_sanksi');
        return $this->db->get('sanksi')->result();
    }
}