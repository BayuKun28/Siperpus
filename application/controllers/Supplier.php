<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $data['title'] = ' Daftar Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supplier/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function addsup()
    {
        $data['title'] = 'Tambah Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama_suppplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('supplier/add_sup', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $up = [
                'nama_supplier' => $this->input->post('nama_supplier', true),
                'alamat' => $this->input->post('alamat', true),
                'ket' => $this->input->post('ket', true)
            ];
            $this->db->insert('supplier', $up);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambah</div>');
            redirect('supplier/addsup');
        }
    }
    public function detail()
    {
        $data['title'] = 'Detail Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['detail'] = $this->db->get_where('tb_buku', ['id' => $idbuku])->row_array();

        $this->load->model('Supplier_model', 'supplier');
        $data['detail'] = $this->supplier->getdetail(
            $this->uri->segment(3)
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supplier/detail', $data);
        $this->load->view('templates/footer', $data);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_buku');
        redirect('buku');
    }
    public function edit()
    {
        $data['title'] = 'Edit Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $this->load->model('Buku_model', 'buku');
        $data['detail'] = $this->buku->getdetail(
            $this->uri->segment(3)
        );
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'trim|required');
        $this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'trim|required');
        $this->form_validation->set_rules('Penerbit', 'Nama Penerbit', 'trim|required');
        $this->form_validation->set_rules('Tahun', 'Tahun', 'trim|required');
        $this->form_validation->set_rules('supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            // $up = [
            $nama_buku =  $this->input->post('judul_buku');
            $pengarang =  $this->input->post('pengarang');
            $penerbit =  $this->input->post('penerbit');
            $tahun = $this->input->post('tahun');
            $status = $this->input->post('status');
            $ket = $this->input->post('ket');
            $this->db->set('nama_buku', $nama_buku);
            $this->db->set('pengarang', $pengarang);
            $this->db->set('penerbit', $penerbit);
            $this->db->set('tahun', $tahun);
            $this->db->set('status', $status);
            $this->db->set('ket', $ket);
            $this->db->where('id', $id);
            $this->db->update('tb_buku');
        }
    }
}
