<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class Kesiswaan_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function get_Kesiswaan($nipy){
        $this->db->where('nipy', $nipy);
        return $this->db->get('user')->row();
    }
}