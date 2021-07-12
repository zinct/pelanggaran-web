<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_login_siswa($pengguna,$katasandi){
        $this->db->where('nis', $pengguna);
        $this->db->where('kata_sandi', $katasandi);
        return $this->db->get('siswa')->row();
    }
    function get_login_staff($pengguna,$katasandi){
        $this->db->where('nipy', $pengguna);
        $this->db->where('kata_sandi', $katasandi);
        return $this->db->get('user')->row();
    }
    // function get_login_dosen($pengguna,$katasandi){
    //     $this->db->where('nip', $pengguna);
    //     $this->db->where('kata_sandi', $katasandi);
    //     return $this->db->get('dosen')->row();
    // }


    function get_reset_password_mahasiswa($pengguna,$email){
        $this->db->where('nim', $pengguna);
        $this->db->where('email', $email);
        return $this->db->get('mahasiswa')->row();
    }

    function get_reset_password_dosen($pengguna,$email){
        $this->db->where('nip', $pengguna);
        $this->db->where('email', $email);
        return $this->db->get('dosen')->row();
    }
    function get_reset_password_staff($pengguna,$email){
        $this->db->where('nip', $pengguna);
        $this->db->where('email', $email);
        return $this->db->get('staff')->row();
    }

    function get_reset_password_mahasiswa_2($pengguna){
        $this->db->where('nim', $pengguna);
        return $this->db->get('mahasiswa')->row();
    }

    function get_reset_password_dosen_2($pengguna){
        $this->db->where('nip', $pengguna);
        return $this->db->get('dosen')->row();
    }
    function get_reset_password_staff_2($pengguna){
        $this->db->where('nip', $pengguna);
        return $this->db->get('staff')->row();
    }



    function ubah_password_mahasiswa($nim, $data){
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa', $data);
    }

    function ubah_password_dosen($nip, $data){
        $this->db->where('nip', $nim);
        $this->db->update('dosen', $data);
    }

    function ubah_password_staff($nip, $data){
        $this->db->where('nip', $nim);
        $this->db->update('dosen', $data);
    }
}