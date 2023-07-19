<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['pupuk'] = $this->db->get('tbl_pupuk')->result_array();
        $user = $data['user']['id'];
        $this->load->model('Pelanggan_model');
        $data['cart'] = $this->Pelanggan_model->cart($user);
        $data['totalcart'] = $this->Pelanggan_model->totalcart($user);
        $this->load->view('pelanggan/template/header', $data);
        $this->load->view('pelanggan/index', $data);
        $this->load->view('pelanggan/template/footer', $data);
    }
    public function detail()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $detail = $this->input->get('pupuk');
        $data['pupuk'] = $this->db->get('tbl_pupuk', ['id' => $detail])->row_array();
        $user = $data['user']['id'];
        $this->load->model('Pelanggan_model');
        $data['cart'] = $this->Pelanggan_model->cart($user);
        $data['totalcart'] = $this->Pelanggan_model->totalcart($user);
        // var_dump($data['pupuk']);
        // die;
        $this->load->view('pelanggan/template/header', $data);
        $this->load->view('pelanggan/detail', $data);
        $this->load->view('pelanggan/template/footer', $data);
    }
    public function addcart()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $jumlah = $this->input->post('jumlah');
        $cart = [
            'id_user' => $data['user']['id'],
            'id_pupuk' => $this->input->get('pupuk'),
            'jumlah' => $jumlah,
        ];
        $this->db->insert('tbl_keranjang', $cart);
        redirect('pelanggan/cart');
    }
    public function cart()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $user = $data['user']['id'];
        $this->load->model('Pelanggan_model');
        $data['cart'] = $this->Pelanggan_model->cart($user);
        $data['totalcart'] = $this->Pelanggan_model->totalcart($user);
        $this->load->view('pelanggan/template/header', $data);
        $this->load->view('pelanggan/cart', $data);
        $this->load->view('pelanggan/template/footer', $data);
    }
}
