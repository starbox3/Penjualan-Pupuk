<?php

use PhpOffice\PhpSpreadsheet\Chart\Title;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['pupuk'] = $this->db->get('tbl_pupuk')->result_array();
        $data['title'] = 'Home';
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
        $data['title'] = 'null';
        $data['pupuk'] = $this->db->get_where('tbl_pupuk', ['id' => $detail])->row_array();
        $user = $data['user']['id'];
        $this->load->model('Pelanggan_model');
        $data['cart'] = $this->Pelanggan_model->cart($user);
        $data['totalcart'] = $this->Pelanggan_model->totalcart($user);
        $data['tani'] = $this->Pelanggan_model->datapetani($user);
        $data['max'] = $data['tani']['luas_lahan'] / 0.125;
        $this->load->view('pelanggan/template/header', $data);
        $this->load->view('pelanggan/detail', $data);
        $this->load->view('pelanggan/template/footer', $data);
    }
    public function addcart()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $user = $data['user']['id'];
        $this->load->model('Pelanggan_model');
        $detail = $this->input->get('pupuk');
        $cart = $this->Pelanggan_model->sama($user, $detail);
        $data['tani'] = $this->Pelanggan_model->datapetani($user);

        $id = $this->db->get_where('tbl_keranjang', ['id_user' => $user, 'id_pupuk' => $detail, 'status_keranjang' => 1])->row_array();
        $data['pupuk'] = $this->db->get_where('tbl_pupuk', ['id' => $detail])->row_array();
        $data['max'] = $data['tani']['luas_lahan'] / 0.125;
        // var_dump(round($up));
        // die;
        $jumlah = $this->input->post('jumlah');
        if ($cart == 1) {
            $this->db->where('id_cart', $id['id_cart']);
            $this->db->delete('tbl_keranjang');
            if ($jumlah <= round($data['max'])) {
                $cart = [
                    'id_user' => $data['user']['id'],
                    'id_pupuk' => $this->input->get('pupuk'),
                    'jumlah' => $jumlah,
                    'total_harga' => $data['pupuk']['harga'] * $jumlah,
                    'status_keranjang' => 1,
                ];
                $this->db->insert('tbl_keranjang', $cart);
                redirect('pelanggan/cart');
            }
            if ($jumlah >= round($data['max'])) {
                redirect('pelanggan/detail?pupuk=' . $detail);
            }
        } else {
            if ($jumlah <= round($data['max'])) {
                $cart = [
                    'id_user' => $data['user']['id'],
                    'id_pupuk' => $this->input->get('pupuk'),
                    'jumlah' => $jumlah,
                    'total_harga' => $data['pupuk']['harga'] * $jumlah,
                    'status_keranjang' => 1,
                ];
                $this->db->insert('tbl_keranjang', $cart);
                redirect('pelanggan/cart');
            }
            if ($jumlah >= round($data['max'])) {
                redirect('pelanggan/detail?pupuk=' . $detail);
            }
        }
    }
    public function updatecart()
    {
        $id_cart = $this->input->post('cartId');
        $this->db->where('id_cart', $id_cart);
        $this->db->delete('tbl_keranjang');
    }
    public function cart()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $user = $data['user']['id'];
        $this->load->model('Pelanggan_model');
        $data['title'] = 'null';
        $data['cart'] = $this->Pelanggan_model->cart($user);
        $data['totalbayar'] = $this->Pelanggan_model->totalbayar($user);
        $data['totalcart'] = $this->Pelanggan_model->totalcart($user);
        $this->load->view('pelanggan/template/header', $data);
        $this->load->view('pelanggan/cart', $data);
        $this->load->view('pelanggan/template/footer', $data);
    }
    public function pembayaran()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $user = $data['user']['id'];
        $data['title'] = 'null';
        $this->load->model('Pelanggan_model');
        $data['totalcart'] = $this->Pelanggan_model->totalcart($user);
        $data['bank'] = $this->db->get('tbl_bank')->result_array();
        $this->load->view('pelanggan/template/header', $data);
        $this->load->view('pelanggan/pembayaran', $data);
        $this->load->view('pelanggan/template/footer', $data);
    }
    public function detailPembayaran()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $user = $data['user']['id'];
        $data['title'] = 'null';
        $this->load->model('Pelanggan_model');
        $data['totalcart'] = $this->Pelanggan_model->totalcart($user);
        $data['totalbayar'] = $this->Pelanggan_model->totalbayar($user);
        $banks = $this->input->get('bank');
        $data['bank'] = $this->db->get_where('tbl_bank', ['id_bank' => $banks])->row_array();
        // var_dump($data['bank']);
        // die;
        $this->load->view('pelanggan/template/header', $data);
        $this->load->view('pelanggan/detailpembayaran', $data);
        $this->load->view('pelanggan/template/footer', $data);
    }
    public function uploadPembayaran()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $user = $data['user']['id'];
        $data['title'] = 'null';
        $this->load->model('Pelanggan_model');
        $data['totalcart'] = $this->Pelanggan_model->totalcart($user);
        $data['totalbayar'] = $this->Pelanggan_model->totalbayar($user);
        $this->load->view('pelanggan/template/header', $data);
        $this->load->view('pelanggan/uploadpembayaran', $data);
        $this->load->view('pelanggan/template/footer', $data);
    }
    public function upload()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $user = $data['user']['id'];
        $bank = $this->input->get('bank');
        $namabank = $this->db->get_where('tbl_bank', ['id_bank' => $bank])->row_array();
        $this->load->model('Pelanggan_model');
        $data['totalcart'] = $this->Pelanggan_model->totalcart($user);
        $data['totalbayar'] = $this->Pelanggan_model->totalbayar($user);
        $datacart = $this->Pelanggan_model->cart($user);
        $length = 9;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        $databayar = [
            'nama_bank' => $namabank['nama_bank'],
            'nominal' => $data['totalbayar']['total_bayar'],
            'tanggal_pembayaran' => date('Y-m-d H:i:s'),
            'id_pembayaran' => $randomString,
            'id_user' => $user

        ];
        $upload_favicon = $_FILES['file']['name'];
        if ($upload_favicon == null) {
            redirect('pelanggan/uploadPembayaran?bank=' . $bank);
        } else {
            $upload_favicon = $_FILES['file']['name'];
            if ($upload_favicon) {
                $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
                $config['max_size']      = '9048';
                $config['upload_path']   = './assets/template/dist/img/slip/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('file_bukti', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->insert('tbl_pembayaran', $databayar);
            $cart = [
                'status_keranjang' => 0,
                'id_pembayaran' => $randomString
            ];
            foreach ($datacart as $ct) {
                $this->db->where('id_cart', $ct['id_cart']);
                $this->db->update('tbl_keranjang', $cart);
            }
        }
        redirect('pelanggan/riwayatpembelian');
    }
    public function riwayatpembelian()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $user = $data['user']['id'];
        $this->load->model('Pelanggan_model');
        $data['title'] = 'Riwayat';
        $data['cart'] = $this->Pelanggan_model->cart($user);
        $data['totalbayar'] = $this->Pelanggan_model->totalbayar($user);
        $data['riwayatbayar'] = $this->Pelanggan_model->riwayatpembelian($user);
        $data['totalcart'] = $this->Pelanggan_model->totalcart($user);
        $this->load->view('pelanggan/template/header', $data);
        $this->load->view('pelanggan/riwayatpembelian', $data);
        $this->load->view('pelanggan/template/footer', $data);
    }
}
