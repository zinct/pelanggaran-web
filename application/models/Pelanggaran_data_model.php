<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Pelanggaran_data_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Pelanggaran($id_tahun, $limit = false, $notif = false){
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
                siswa.image,
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

        if($limit)
            $this->db->limit($limit);

        if($notif)
            $this->db->where('pelanggaran_data.status', 'Jatuh Sanksi');

        return $this->db->get('pelanggaran_data')->result();
    }

    function get_Pelanggaran_statistik($id_tahun){
        return $this->db->query("
            SELECT nama_jenis_pelanggaran AS pelanggaran
            FROM pelanggaran_data 
            JOIN pelanggaran ON pelanggaran_data.id_pelanggaran = pelanggaran.id_pelanggaran
            JOIN jenis_pelanggaran ON pelanggaran.id_jenis_pelanggaran = jenis_pelanggaran.id_jenis_pelanggaran
            WHERE pelanggaran_data.id_tahun = $id_tahun AND pelanggaran_data.status = 'Disetujui'
            GROUP BY nama_jenis_pelanggaran
        ")->result();
    }

    function get_pelanggaran_kelas12($id_tahun){
        return $this->db->query("
            SELECT COUNT(pelanggaran_data.id_pelanggaran_data) AS total, nama_jenis_pelanggaran AS pelanggaran
            FROM pelanggaran_data
            JOIN pelanggaran ON pelanggaran_data.id_pelanggaran = pelanggaran.id_pelanggaran
            JOIN jenis_pelanggaran ON pelanggaran.id_jenis_pelanggaran = jenis_pelanggaran.id_jenis_pelanggaran
            JOIN kelas ON pelanggaran_data.id_kelas = kelas.id_kelas
            WHERE pelanggaran_data.id_tahun = $id_tahun AND pelanggaran_data.status = 'Disetujui' AND tingkat = '12'
            GROUP BY pelanggaran.id_jenis_pelanggaran
        ")->result();
    }

    function get_pelanggaran_kelas11($id_tahun){
        return $this->db->query("
            SELECT COUNT(pelanggaran_data.id_pelanggaran_data) AS total, nama_jenis_pelanggaran AS pelanggaran
            FROM pelanggaran_data
            JOIN pelanggaran ON pelanggaran_data.id_pelanggaran = pelanggaran.id_pelanggaran
            JOIN jenis_pelanggaran ON pelanggaran.id_jenis_pelanggaran = jenis_pelanggaran.id_jenis_pelanggaran
            JOIN kelas ON pelanggaran_data.id_kelas = kelas.id_kelas
            WHERE pelanggaran_data.id_tahun = $id_tahun AND pelanggaran_data.status = 'Disetujui' AND tingkat = '11'
            GROUP BY pelanggaran.id_jenis_pelanggaran
        ")->result();
    }

    function get_pelanggaran_kelas10($id_tahun){
        return $this->db->query("
            SELECT COUNT(pelanggaran_data.id_pelanggaran_data) AS total, nama_jenis_pelanggaran AS pelanggaran
            FROM pelanggaran_data
            JOIN pelanggaran ON pelanggaran_data.id_pelanggaran = pelanggaran.id_pelanggaran
            JOIN jenis_pelanggaran ON pelanggaran.id_jenis_pelanggaran = jenis_pelanggaran.id_jenis_pelanggaran
            JOIN kelas ON pelanggaran_data.id_kelas = kelas.id_kelas
            WHERE pelanggaran_data.id_tahun = $id_tahun AND pelanggaran_data.status = 'Disetujui' AND tingkat = '10'
            GROUP BY pelanggaran.id_jenis_pelanggaran
        ")->result();
    }

    function get_Laporan_Pelanggaran_siswa($id_tahun){
        $this->db->select(
            '   
                nama_siswa, nis,nama_kelas,
                COUNT(pelanggaran_data.id_pelanggaran_data) AS jumlah_pelanggaran,
                SUM(pelanggaran_data.poin) AS jumlah_poin
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
        $this->db->group_by('pelanggaran_data.id_siswa');
        $this->db->group_by('kelas.nama_kelas'); 
        $this->db->where('tahun.id_tahun', $id_tahun);
        $this->db->where('pelanggaran_data.status', 'Disetujui');

        return $this->db->get('pelanggaran_data')->result();
    }

    function get_Laporan_Pelanggaran_kelas($id_tahun){
        $this->db->select(
            '   
                nama_kelas, nama_jurusan,
                COUNT(pelanggaran_data.id_pelanggaran_data) AS jumlah_pelanggaran,
                SUM(pelanggaran_data.poin) AS jumlah_poin
            '
        );
        $this->db->join('pelanggaran', 'pelanggaran.id_pelanggaran = pelanggaran_data.id_pelanggaran');
        $this->db->join('jenis_pelanggaran', 'pelanggaran.id_jenis_pelanggaran = jenis_pelanggaran.id_jenis_pelanggaran');
        $this->db->join('kategori_pelanggaran', 'jenis_pelanggaran.id_kategori_pelanggaran = kategori_pelanggaran.id_kategori_pelanggaran');
        $this->db->join('siswa', 'siswa.id_siswa = pelanggaran_data.id_siswa');
        $this->db->join('kelas_siswa', 'siswa.id_siswa = kelas_siswa.id_siswa');
        $this->db->join('kelas', 'kelas.id_kelas = kelas_siswa.id_kelas');
        $this->db->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        $this->db->join('ptk', 'ptk.id_ptk = pelanggaran_data.id_ptk');
        $this->db->join('tahun', 'tahun.id_tahun = pelanggaran_data.id_tahun AND tahun.id_tahun=kelas.id_tahun');
        $this->db->join('sanksi', 'sanksi.id_sanksi = pelanggaran_data.id_sanksi');
        $this->db->join('kategori_sanksi', 'kategori_sanksi.id_kategori_sanksi = sanksi.kategori_sanksi_id');
        $this->db->group_by('kelas.id_kelas');
        $this->db->group_by('kelas.nama_kelas');
        $this->db->where('tahun.id_tahun', $id_tahun);
        $this->db->where('pelanggaran_data.status', 'Disetujui');

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