<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {
    
    public $id_user;
    public $nama;
    public $username;
    public $password;


    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);
        $query = $this->db->get();
        return $query;
    }

}


?>