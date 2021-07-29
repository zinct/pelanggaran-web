<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Pelanggaran_data_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Pelanggaran($id_tahun){
        $this->db->select(
            '   pelanggaran_data.id_pelanggaran_data, 
                pelanggaran_data.id_pelanggaran, 
                jenis_pelanggaran.id_jenis_pelanggaran, 
                jenis_pelanggaran.nama_jenis_pelanggaran, 
                kategori_pelanggaran.id_kategori_pelanggaran, 
                kategori_pelanggaran.nama_kategori_pelanggaran, 
                pelanggaran.nama_pelanggaran, 
                pelanggaran_data.id_siswa, 
                siswa.nama_siswa, 
                siswa.nis, 
                kelas.nama_kelas, 
                pelanggaran_data.id_ptk, 
                ptk.nama_ptk, 
                pelanggaran_data.tgl, 
                pelanggaran_data.poin, 
                pelanggaran_data.catatan, 
                pelanggaran_data.id_tahun, 
                tahun.nama_tahun, 
                pelanggaran_data.id_sanksi, 
                sanksi.nama_sanksi, 
                kategori_sanksi.nama_kategori_sanksi, 
                pelanggaran_data.poin,
                pelanggaran_data.status
            '
        );
        $this->db->join('pelanggaran', 'pelanggaran.id_pelanggaran = pelanggaran_data.id_pelanggaran');
        $this->db->join('jenis_pelanggaran', 'pelanggaran.id_jenis_pelanggaran = jenis_pelanggaran.id_jenis_pelanggaran');
        $this->db->join('kategori_pelanggaran', 'jenis_pelanggaran.id_kategori_pelanggaran = kategori_pelanggaran.id_kategori_pelanggaran');
        $this->db->join('siswa', 'siswa.id_siswa = pelanggaran_data.id_siswa');
        $this->db->join('kelas_siswa', 'siswa.id_siswa = kelas_siswa.id_siswa');
        $this->db->join('kelas', 'kelas.id_kelas = kelas_siswa.id_kelas');
        $this->db->join('ptk', 'ptk.id_ptk = pelanggaran_data.id_ptk');
        $this->db->join('tahun', 'tahun.id_tahun = pelanggaran_data.id_tahun AND tahun.id_tahun=kelas.id_tahun');
        $this->db->join('sanksi', 'sanksi.id_sanksi = pelanggaran_data.id_sanksi');
        $this->db->join('kategori_sanksi', 'kategori_sanksi.id_kategori_sanksi = sanksi.kategori_sanksi_id');
        $this->db->where('tahun.id_tahun', $id_tahun);
        $this->db->order_by('pelanggaran_data.tgl', 'desc');
        return $this->db->get('pelanggaran_data')->result();
    }

    function get_Pelanggaran_siswa($id_tahun, $id_siswa){
        $this->db->select(
            '   pelanggaran_data.id_pelanggaran_data, 
                pelanggaran_data.id_pelanggaran, 
                jenis_pelanggaran.id_jenis_pelanggaran, 
                jenis_pelanggaran.nama_jenis_pelanggaran, 
                kategori_pelanggaran.id_kategori_pelanggaran, 
                kategori_pelanggaran.nama_kategori_pelanggaran, 
                pelanggaran.nama_pelanggaran, 
                pelanggaran_data.id_siswa, 
                siswa.nama_siswa, 
                siswa.nis, 
                kelas.nama_kelas, 
                pelanggaran_data.id_ptk, 
                ptk.nama_ptk, 
                pelanggaran_data.tgl, 
                pelanggaran_data.poin, 
                pelanggaran_data.catatan, 
                pelanggaran_data.id_tahun, 
                tahun.nama_tahun, 
                pelanggaran_data.id_sanksi, 
                sanksi.nama_sanksi, 
                kategori_sanksi.nama_kategori_sanksi, 
                pelanggaran_data.poin,
                pelanggaran_data.status
            '
        );
        $this->db->join('pelanggaran', 'pelanggaran.id_pelanggaran = pelanggaran_data.id_pelanggaran');
        $this->db->join('jenis_pelanggaran', 'pelanggaran.id_jenis_pelanggaran = jenis_pelanggaran.id_jenis_pelanggaran');
        $this->db->join('kategori_pelanggaran', 'jenis_pelanggaran.id_kategori_pelanggaran = kategori_pelanggaran.id_kategori_pelanggaran');
        $this->db->join('siswa', 'siswa.id_siswa = pelanggaran_data.id_siswa');
        $this->db->join('kelas_siswa', 'siswa.id_siswa = kelas_siswa.id_siswa');
        $this->db->join('kelas', 'kelas.id_kelas = kelas_siswa.id_kelas');
        $this->db->join('ptk', 'ptk.id_ptk = pelanggaran_data.id_ptk');
        $this->db->join('tahun', 'tahun.id_tahun = pelanggaran_data.id_tahun AND tahun.id_tahun=kelas.id_tahun');
        $this->db->join('sanksi', 'sanksi.id_sanksi = pelanggaran_data.id_sanksi');
        $this->db->join('kategori_sanksi', 'kategori_sanksi.id_kategori_sanksi = sanksi.kategori_sanksi_id');
        $this->db->where('tahun.id_tahun', $id_tahun);
        $this->db->where('siswa.id_siswa', $id_siswa);
        $this->db->order_by('pelanggaran_data.tgl', 'desc');
        return $this->db->get('pelanggaran_data')->result();
    }

    function get_TahunAktif(){
        $this->db->where('is_aktif', 1);
        return $this->db->get('tahun')->row();
    }
}