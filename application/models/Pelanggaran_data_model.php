<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Pelanggaran_data_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Data_Pelanggaran($cari = null){
        $this->db->like('kd_data_pelanggaran', $cari);
        $this->db->or_like('pelanggaran_data.kd_pelanggaran', $cari);
        $this->db->or_like('pelaku', $cari);
        $this->db->or_like('tanggal_pelanggaran', $cari);
        $this->db->or_like('status_pelanggaran', $cari);
        $this->db->order_by('tanggal_pelanggaran', 'DESC');
        $this->db->join('pelanggaran','pelanggaran_data.kd_pelanggaran=pelanggaran.kd_pelanggaran');
        $this->db->join('siswa','pelanggaran_data.pelaku=siswa.nis');
        $this->db->join('absen','siswa.nis=absen.nis');
        $this->db->join('kelas','absen.kd_kelas=kelas.kd_kelas');
        $this->db->join('jurusan','kelas.kd_jurusan=jurusan.kd_jurusan');
        $this->db->join('tahun','absen.kd_tahun=tahun.kd_tahun');
        return $this->db->get('pelanggaran_data');
    }

    function get_Data_Pelanggaran_Poin($nis = null){
        $this->db->select_sum('poin');
        $this->db->where('pelaku', $nis);
        $this->db->order_by('tanggal_pelanggaran', 'DESC');
        $this->db->join('pelanggaran','pelanggaran_data.kd_pelanggaran=pelanggaran.kd_pelanggaran');
        $this->db->join('siswa','pelanggaran_data.pelaku=siswa.nis');
        $this->db->join('absen','siswa.nis=absen.nis');
        $this->db->join('kelas','absen.kd_kelas=kelas.kd_kelas');
        $this->db->join('jurusan','kelas.kd_jurusan=jurusan.kd_jurusan');
        $this->db->join('tahun','absen.kd_tahun=tahun.kd_tahun');
        return $this->db->get('pelanggaran_data');
    }

    function jumlah_Data_Pelanggaran($cari = null){
        $this->db->like('kd_data_pelanggaran', $cari);
        $this->db->or_like('pelanggaran_data.kd_pelanggaran', $cari);
        $this->db->or_like('pelaku', $cari);
        $this->db->or_like('tanggal_pelanggaran', $cari);
        $this->db->or_like('status_pelanggaran', $cari);
        $this->db->order_by('status_pelanggaran', 'DESC');
        $this->db->join('pelanggaran','pelanggaran_data.kd_pelanggaran=pelanggaran.kd_pelanggaran');
        $this->db->join('siswa','pelanggaran_data.pelaku=siswa.nis');
        $this->db->join('absen','siswa.nis=absen.nis');
        $this->db->join('kelas','absen.kd_kelas=kelas.kd_kelas');
        $this->db->join('jurusan','kelas.kd_jurusan=jurusan.kd_jurusan');
        $this->db->join('tahun','absen.kd_tahun=tahun.kd_tahun');
        return $this->db->count_all_results('pelanggaran_data');
    }

    function input_Data_Pelanggaran($data){
        $this->db->insert('pelanggaran_data', $data);
    }
}