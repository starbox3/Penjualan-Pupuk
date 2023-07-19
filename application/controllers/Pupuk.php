<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pupuk extends CI_Controller
{
    public function index()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['pupuk'] = $this->db->get('tbl_pupuk')->result_array();
        $this->load->view('pupuk/template/header', $data);
        $this->load->view('pupuk/index', $data);
        $this->load->view('pupuk/template/footer', $data);
    }
    public function detail()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $detail = $this->input->get('detail');
        $data['pupuk'] = $this->db->get('tbl_pupuk', ['id' => $detail])->row_array();
        $this->load->view('pupuk/template/header', $data);
        $this->load->view('pupuk/detail', $data);
        $this->load->view('pupuk/template/footer', $data);
    }
}
