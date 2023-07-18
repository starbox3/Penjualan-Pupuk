<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekdes extends CI_Controller
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
        $this->load->view('sekdes/index', $data);
        $this->load->view('templates/footer');
    }
    public function messageEdit()
    {
        $messageEdit = "
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000
        });
        toastr.success('Sukses! Data telah berhasil di update')
        ";
        return $messageEdit;
    }
    public function Error_404()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Error 404';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/error-404', $data);
        $this->load->view('templates/footer');
    }
    public function suratmasuk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Surat Masuk';
        $this->load->model('Admin_model');
        $data['surat'] = $this->Admin_model->viewSuratMasuk();
        $data['penduduk'] = $this->db->get('tbl_data_penduduk')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('sekdes/suratmasuk', $data);
        $this->load->view('templates/footer');
    }
    public function updateSuratMasuk()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $idsurat = $this->input->post('surat');
        $data = [
            'penerima' => $data['user']['name'],
            'tanggal_terima' => date('Y-m-d'),
            'status' => $this->input->post('status'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->where('no_agenda', $idsurat);
        $this->db->update('tbl_surat_masuk', $data);
        $this->session->set_flashdata('messageEdit', $this->messageEdit());
        redirect('sekdes/suratMasuk');
    }
    public function viewDataSuratMasuk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Surat Masuk';
        $surat = $this->input->get('surat');
        $this->load->model('Sekdes_model');
        $data['surat'] = $this->Sekdes_model->viewSuratMasuk($surat);
        if ($data['surat'] == null) {
            redirect('sekdes/Error_404');
        } else {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('sekdes/viewdatasuratmasuk', $data);
            $this->load->view('templates/footer');
        }
    }
    public function suratKeluar()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Surat Keluar';
        $this->load->model('Admin_model');
        $data['surat'] = $this->Admin_model->viewSuratKeluar();
        $data['penduduk'] = $this->db->get('tbl_data_penduduk')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('sekdes/suratkeluar', $data);
        $this->load->view('templates/footer');
    }
    public function viewDataSuratkeluar()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Surat Keluar';
        $surat = $this->input->get('surat');
        $this->load->model('Sekdes_model');
        $data['surat'] = $this->Sekdes_model->viewSuratKeluar($surat);
        if ($data['surat'] == null) {
            redirect('sekdes/Error_404');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('sekdes/viewdatasuratkeluar', $data);
            $this->load->view('templates/footer');
        }
    }
    public function updateSuratKeluar()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $idsurat = $this->input->post('surat');
        $data = [
            'penerima' => $data['user']['name'],
            'tanggal_terima' => date('Y-m-d'),
            'status' => $this->input->post('status'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        // var_dump($data);
        // die;
        $this->db->where('no_agenda', $idsurat);
        $this->db->update('tbl_surat_keluar', $data);
        $this->session->set_flashdata('messageEdit', $this->messageEdit());
        redirect('sekdes/suratKeluar');
    }
}
