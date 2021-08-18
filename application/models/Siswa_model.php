<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Siswa_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Siswa(){
        $this->db->join('kelas_siswa', 'kelas_siswa.id_siswa = siswa.id_siswa')
                ->join('kelas', 'kelas_siswa.id_kelas = kelas.id_kelas')
                ->join('tahun', 'tahun.id_tahun = kelas.id_tahun');
        $this->db->where('tahun.is_aktif', 1);
        return $this->db->get('siswa')->result();
    }
    function get_Siswa_id($id){
        $this->db->join('kelas_siswa', 'kelas_siswa.id_siswa = siswa.id_siswa')
                ->join('kelas', 'kelas_siswa.id_kelas = kelas.id_kelas')
                ->join('tahun', 'tahun.id_tahun = kelas.id_tahun');
        $this->db->where('tahun.is_aktif', 1);
        $this->db->where('siswa.id_siswa', $id);
        return $this->db->get('siswa')->row();
    }

    function get_SiswaNoKelas($id_tahun){
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
    
    function get_Tahun(){
        $this->db->where('is_aktif', 1);
        return $this->db->get('tahun')->row();
    }

    function find($id) {
        $this->db->join('kelas_siswa', 'kelas_siswa.id_siswa = siswa.id_siswa')
                ->join('kelas', 'kelas_siswa.id_kelas = kelas.id_kelas')
                ->join('tahun', 'tahun.id_tahun = kelas.id_tahun');
        $this->db->where(['siswa.id_siswa'=> $id, 'tahun.is_aktif'=> 1]);
        return $this->db->get('siswa')->row();
    }

    function find_nis($id) {
        $this->db->join('kelas_siswa', 'kelas_siswa.id_siswa = siswa.id_siswa')
                ->join('kelas', 'kelas_siswa.id_kelas = kelas.id_kelas')
                ->join('tahun', 'tahun.id_tahun = kelas.id_tahun');
        $this->db->where(['siswa.nis'=> $id, 'tahun.is_aktif'=> 1]);
        return $this->db->get('siswa')->row();
    }

    function get_poin($id_siswa) {
        return $this->db->query("SELECT
                                IFNULL(SUM(poin), 0) as poin 
                                FROM
                                pelanggaran_data
                                INNER JOIN tahun ON tahun.id_tahun = pelanggaran_data.id_tahun 
                                WHERE
                                id_siswa = '$id_siswa' 
                                AND tahun.is_aktif =1
                                AND pelanggaran_data.status = 'Disetujui'
                                ")->row()->poin;
    }

    function get_poin_pelanggaran($id_siswa) {
        return $this->db->query("SELECT
                                IFNULL(SUM(poin), 0) as poin 
                                FROM
                                pelanggaran_data
                                INNER JOIN tahun ON tahun.id_tahun = pelanggaran_data.id_tahun 
                                WHERE
                                id_siswa = '$id_siswa' 
                                AND tahun.is_aktif =1
                                AND pelanggaran_data.status != 'Anulir'
                                ")->row()->poin;
    }
}