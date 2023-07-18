<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rt extends CI_Controller
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
        $this->load->view('rt/index', $data);
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
        toastr.success('Success! Data telah berhasil di edit')
        ";
        return $messageEdit;
    }
    public function messageAdd()
    {
        $messageAdd = "
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000
        });
        toastr.success('Sukses! Data telah berhasil di tambahkan')
        ";
        return $messageAdd;
    }
    public function messageDelete()
    {
        $messageDelete = "
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000
        });
        toastr.success('Sukses! Data telah berhasil di hapus')
        ";
        return $messageDelete;
    }
    public function messageNoSelect()
    {
        $messageNoSelect = "
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000
        });
        toastr.warning('Peringatan! Tidak ada data yang di pilih')
        ";
        return $messageNoSelect;
    }
    public function dataPenduduk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Penduduk';
        $data['rt'] = $data['user']['id'];
        $this->load->model('Rt_model');
        $data['penduduk'] = $this->Rt_model->tblPenduduk($data['rt']);
        $this->form_validation->set_rules(
            'nik',
            'Nik',
            'required|trim|is_unique[tbl_data_penduduk.nik]',
            [
                'is_unique' => 'NIK ini sudah ada terdaftar di sistem!'
            ]
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('rt/datapenduduk', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'provinsi' => $this->input->post('provinsi'),
                'kabupaten' => $this->input->post('kabupaten'),
                'nama' => $this->input->post('nama'),
                'tanggal_lahir' => $this->input->post('tanggallahir'),
                'tempat_lahir' => $this->input->post('tempatlahir'),
                'jenis_kelamin' => $this->input->post('jeniskelamin'),
                'golongan_darah' => $this->input->post('golongandarah'),
                'alamat' => $this->input->post('alamat'),
                'rt_rw' => $this->input->post('rtrw'),
                'kel_desa' => $this->input->post('keldesa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'agama' => $this->input->post('agama'),
                'status' => $this->input->post('status'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'kewarganegaraan' => $this->input->post('kewarganegaraan'),
                'id_user' => $data['user']['id'],
            ];
            $this->db->insert('tbl_data_penduduk', $data);
            $this->session->set_flashdata('messageAdd', $this->messageAdd());
            redirect('rt/dataPenduduk');
        }
    }
    // public function addPenduduk()
    // {
    //     $data = [
    //         'nik' => $this->input->post('nik'),
    //         'provinsi' => $this->input->post('provinsi'),
    //         'kabupaten' => $this->input->post('kabupaten'),
    //         'nama' => $this->input->post('nama'),
    //         'tanggal_lahir' => $this->input->post('tanggallahir'),
    //         'tempat_lahir' => $this->input->post('tempatlahir'),
    //         'jenis_kelamin' => $this->input->post('jeniskelamin'),
    //         'golongan_darah' => $this->input->post('golongandarah'),
    //         'alamat' => $this->input->post('alamat'),
    //         'rt_rw' => $this->input->post('rtrw'),
    //         'kel_desa' => $this->input->post('keldesa'),
    //         'kecamatan' => $this->input->post('kecamatan'),
    //         'agama' => $this->input->post('agama'),
    //         'status' => $this->input->post('status'),
    //         'pekerjaan' => $this->input->post('pekerjaan'),
    //         'kewarganegaraan' => $this->input->post('kewarganegaraan'),
    //     ];
    //     $this->db->insert('tbl_data_penduduk', $data);
    //     $this->session->set_flashdata('messageAdd', $this->messageAdd());
    //     redirect('rt/dataPenduduk');
    // }
    public function deleteAllPenduduk()
    {
        if (isset($_POST['deleteselect'])) {
            if (!empty($this->input->post('check_value'))) {
                $checkpost = $this->input->post('check_value');
                $checkid = [];
                foreach ($checkpost as $cp) {
                    array_push($checkid, $cp);
                }
                $this->load->model('Admin_model');
                $this->Admin_model->deleteSelectPenduduk($checkid);
                $this->session->set_flashdata('messageDelete', $this->messageDelete());
                redirect('rt/dataPenduduk');
            } else {
                $this->session->set_flashdata('messageNoSelect', $this->messageNoSelect());
                redirect('rt/dataPenduduk');
            }
        }
        $status = 'Error 500';
        echo json_encode($status);
    }
    public function editPenduduk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Penduduk';
        $nik = $this->input->get('data');
        $data['penduduk'] = $this->db->get_where('tbl_data_penduduk', ['nik' => $nik])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('rt/editpenduduk', $data);
        $this->load->view('templates/footer');
    }
    public function updatePenduduk()
    {
        $nik = $this->input->get('data');
        $data = [
            'nik' => $this->input->post('nik'),
            'provinsi' => $this->input->post('provinsi'),
            'kabupaten' => $this->input->post('kabupaten'),
            'nama' => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggallahir'),
            'tempat_lahir' => $this->input->post('tempatlahir'),
            'jenis_kelamin' => $this->input->post('jeniskelamin'),
            'golongan_darah' => $this->input->post('golongandarah'),
            'alamat' => $this->input->post('alamat'),
            'rt_rw' => $this->input->post('rtrw'),
            'kel_desa' => $this->input->post('keldesa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'agama' => $this->input->post('agama'),
            'status' => $this->input->post('status'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'kewarganegaraan' => $this->input->post('kewarganegaraan'),
        ];
        $this->db->where('nik', $nik);
        $this->db->update('tbl_data_penduduk', $data);
        $this->session->set_flashdata('messageEdit', $this->messageEdit());
        redirect('rt/dataPenduduk');
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
        $this->load->view('rt/viewdata', $data);
        $this->load->view('templates/footer');
    }
}
ini_set('display_errors', 'off');
