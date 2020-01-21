<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {

        $data['title'] = ' Daftar Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Buku_model', 'buku');
        $data['buku'] = $this->buku->getBuku();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function addbuku()
    {
        $data['title'] = 'Tambah Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'trim|required');
        $this->form_validation->set_rules('supplier', 'Supplier', 'trim|required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/add_buku', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $bk = [
                'nama_buku' => $this->input->post('judul_buku', true),
                'id_supplier' => $this->input->post('supplier', true),
                'pengarang' => $this->input->post('pengarang', true),
                'penerbit' => $this->input->post('penerbit', true),
                'tahun' => $this->input->post('tahun', true),
                'status' => $this->input->post('status', true)
            ];
            $this->db->insert('tb_buku', $bk);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
            redirect('buku/addbuku');
        }
    }
}
