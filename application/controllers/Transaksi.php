<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function peminjaman()
    {
        $data['title'] = 'Peminjaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Peminjaman_model', 'pinjam');
        $data['pinjam'] = $this->pinjam->getpeminjaman();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/peminjaman', $data);
        $this->load->view('templates/footer', $data);
    }
    public function pinjamadd()
    {
        $data['title'] = 'Peminjaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Peminjaman_model', 'pinjam');
        $data['peminjam'] = $this->pinjam->getpeminjam();
        $data['buku'] = $this->db->get('tb_buku')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/pinjamadd', $data);
        $this->load->view('templates/footer', $data);
    }
    public function getdatabuku()
    {
        $buk = $this->input->get('buk');
        $this->load->model('Peminjaman_model', 'pinjam');
        $query = $this->pinjam->getbukuselect2($buk, 'nama_buku');
        echo json_encode($query);
    }
    public function getdatapeminjam()
    {
        $peminjam = $this->input->get('peminjam');
        $this->load->model('Peminjaman_model', 'pinjam');
        $query = $this->pinjam->getpeminjamselect2($peminjam, 'name');
        echo json_encode($query);
    }
}
