<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Siswa_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Siswa(){
        $this->db->join('kelas', 'siswa.kelas_id = kelas.id_kelas');
        return $this->db->get('siswa');
    }

    function find($id) {
        $this->db->join('kelas', 'siswa.kelas_id = kelas.id_kelas');
        $this->db->where('id_siswa', $id);
        return $this->db->get('siswa')->row();
    }
}