<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
    public function __construct(){
        $this->load->database();

    }
    public function getItems(){
        $res = $this->db->('Items');
        return  $res->result_array();
    }
}