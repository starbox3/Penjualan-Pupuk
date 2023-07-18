<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat extends CI_Controller
{


	public function index()
	{
		$data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
		$data['title'] = 'Lihat Surat';
		$this->load->view('templates/header_ms', $data);
		$this->load->view('templates/navbar_ms', $data);
		$this->load->view('masyarakat/index', $data);
		$this->load->view('templates/footer_ms', $data);
	}
	public function nik()
	{
		$data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
		$data['title'] = 'Lihat Surat';
		$nik = $this->input->post('nik');
		$data['ms'] = $this->db->get_where('tbl_data_penduduk', ['nik' => $nik])->row_array();
		$data['suratmasuk'] = $this->db->get_where('tbl_surat_masuk', ['nik' => $nik])->result_array();
		if ($data['ms'] == null) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
                    NIK salah data tidak dapat ditemukan!
                  </div>');
			redirect('masyarakat');
		} else {
			$this->load->view('templates/header_ms', $data);
			$this->load->view('templates/navbar_ms', $data);
			$this->load->view('masyarakat/tabel', $data);
			$this->load->view('templates/footer_ms', $data);
		}
	}
}
