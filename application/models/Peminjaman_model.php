<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
    public function getpeminjaman()
    {
        $query = "SELECT tp.id ,u.name as nama_peminjam ,
         tb.nama_buku,tp.tanggal_pinjam,tp.tanggal_harus_kembali,tp.catatan 
         FROM tb_peminjaman tp JOIN user u on (u.id=tp.id_peminjam) 
         JOIN tb_buku tb on (tb.id=tp.id_buku)
         ORDER BY tp.id ASC ";
        return $this->db->query($query)->result_array();
    }
}
