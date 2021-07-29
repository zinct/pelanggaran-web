<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Kelas_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_TahunAll(){
        $this->db->order_by('nama_tahun', 'desc');
        return $this->db->get('tahun')->result();
    }

    function get_TahunAktif(){
        $this->db->where('is_aktif', 1);
        return $this->db->get('tahun')->row();
    }

    function get_Kelas($id_tahun){
        $this->db->select("kelas.id_kelas, kelas.nama_kelas, kelas.tingkat, kelas.id_jurusan, 
            kelas.id_tahun, jurusan.nama_jurusan, IFNULL(ptk.nama_ptk,'') AS nama_ptk, 
            IFNULL(wali_kelas.id_wali_kelas,'') AS id_wali_kelas, IFNULL(wali_kelas.id_ptk,'') AS id_ptk");
        $this->db->join('wali_kelas', 'wali_kelas.id_kelas = kelas.id_kelas','left');
        $this->db->join('ptk', 'ptk.id_ptk = wali_kelas.id_ptk','left');
        $this->db->join('jurusan', 'kelas.id_jurusan = jurusan.id_jurusan','left');
        $this->db->where('kelas.id_tahun', $id_tahun);
        $this->db->order_by('kelas.nama_kelas','asc');
        return $this->db->get('kelas')->result();
    }

    function get_WaliKelas($id_kelas){
        $this->db->where(['id_kelas'=> $id_kelas]);
        return $this->db->get('wali_kelas')->row();
    }

    function get_Siswa($id_kelas){
        $this->db->join('kelas_siswa', 'kelas_siswa.id_siswa = siswa.id_siswa')
                ->join('kelas', 'kelas_siswa.id_kelas = kelas.id_kelas')
                ->join('tahun', 'tahun.id_tahun = kelas.id_tahun');
        $this->db->where('kelas.id_kelas', $id_kelas);
        return $this->db->get('siswa')->result();
    }

    
    function get_SiswaNoKelas($id_tahun){
        $this->db->select("siswa.id_siswa, siswa.nis, siswa.nama_siswa, siswa.jenis_kelamin, kelas.id_tahun");
        $this->db->join('kelas_siswa', 'kelas_siswa.id_siswa = siswa.id_siswa','left')
                ->join('kelas', 'kelas_siswa.id_kelas = kelas.id_kelas','left');
        
        $results = array();

        foreach ($this->db->get('siswa')->result() as $item) {
            if ($item->id_tahun!=$id_tahun) {
                array_push($results,$item);
            }
        }

        return $results;
    }

    function find($id) {
        $this->db->select("kelas.id_kelas, kelas.nama_kelas, kelas.tingkat, kelas.id_jurusan, 
            kelas.id_tahun, jurusan.nama_jurusan, tahun.nama_tahun, tahun.is_aktif, IFNULL(ptk.nama_ptk,'') AS nama_ptk, 
            IFNULL(wali_kelas.id_wali_kelas,'') AS id_wali_kelas, IFNULL(wali_kelas.id_ptk,'') AS id_ptk");
        $this->db->join('wali_kelas', 'wali_kelas.id_kelas = kelas.id_kelas','left');
        $this->db->join('ptk', 'ptk.id_ptk = wali_kelas.id_ptk','left');
        $this->db->join('jurusan', 'kelas.id_jurusan = jurusan.id_jurusan','left');
        $this->db->join('tahun', 'kelas.id_tahun = tahun.id_tahun','left');
        return $this->db->get_where('kelas', ['kelas.id_kelas' => $id])->row();
    } 
}