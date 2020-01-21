<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{
    public function getBuku()
    {
        $query = " SELECT tb.nama_buku ,
        tb.pengarang ,tb.penerbit ,tb.tahun , 
        s.nama_supplier ,tb.ket ,tb.status  
        FROM tb_buku tb 
        LEFT JOIN supplier s on (s.id=tb.id_supplier)
        ORDER BY tb.id";
        return $this->db->query($query)->result_array();
    }
    public function getJmlBuku()
    {
        $jml = "SELECT COUNT(id) as jml FROM tb_buku";
        return $this->db->query($jml)->result_array();
    }
}
