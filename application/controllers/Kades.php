<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kades extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kades/index', $data);
        $this->load->view('templates/footer');
    }

    public function suratmasuk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Surat Masuk';
        // $data['suratmasuk'] = $this->db->get('tbl_surat_masuk')->result_array();
        $this->load->model('Admin_model');
        $data['surat'] = $this->Admin_model->viewSuratMasuk();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kades/suratmasuk', $data);
        $this->load->view('templates/footer');
    }

    public function suratkeluar()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Surat Keluar';
        $this->load->model('Admin_model');
        $data['surat'] = $this->Admin_model->viewSuratKeluar();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kades/suratkeluar', $data);
        $this->load->view('templates/footer');
    }

    public function dataPenduduk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Penduduk';
        $data['penduduk'] = $this->db->get('tbl_data_penduduk')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kades/datapenduduk', $data);
        $this->load->view('templates/footer');
    }

    public function viewData()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Penduduk';
        $nik = $this->input->get('data');
        $data['penduduk'] = $this->db->get_where('tbl_data_penduduk', ['nik' => $nik])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kades/viewdata', $data);
        $this->load->view('templates/footer');
    }
}
ini_set('display_errors', 'off');
