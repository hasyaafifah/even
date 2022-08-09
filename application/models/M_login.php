<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model
{

    //ini model buat loginnya ya sya  

    public function proses_login($username, $password)
    {
        return $this->db->query("SELECT id FROM tb_pengguna WHERE username = '$username' AND password = ('$password')");
    }
}
