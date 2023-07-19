<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->load->view('admin/index', $data);
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
        toastr.success('Sukses! Data telah berhasil di edit')
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
    public function messageIdSama()
    {
        $messageIdSama = "
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000
        });
        toastr.warning('Peringatan! Nama yang anda masukan sudah tersedia')
        ";
        return $messageIdSama;
    }
    public function messageError()
    {
        $messageDelete = "
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000
        });
        Toast.fire({
            icon: 'error',
            title: 'Error... Data yang anda masukan belum lengkap. '
        });
        ";
        return $messageDelete;
    }
    public function Error_404()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Error 404';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/error-api', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['title'] = 'Dashboard Admin';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
    }
    public function role()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['title'] = 'Akses Menu Management';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('messageAdd', $this->messageAdd());
            redirect('admin/role');
        }
    }
    public function roleAccess($role_id)
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['title'] = 'Role Access';
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }
    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('messageEdit', $this->messageEdit());
    }
    public function menu()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['title'] = 'Akses Menu Management';
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/menu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('messageAdd', $this->messageAdd());
            redirect('admin/role');
        }
    }
    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('messageAdd', $this->messageAdd());
            redirect('admin/submenu');
        }
    }
    public function editSubMenu()
    {
        $data['user'] = $this->db->get_where('users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('messageEdit', $this->messageEdit());
            redirect('admin/submenu');
        }
    }
    public function deleteRole($id)
    {
        $this->load->model('Admin_model');
        $this->Admin_model->deleteRole($id);
        $this->session->set_flashdata('messageDelete', $this->messageDelete());
        redirect('admin/role');
    }
    public function deleteSub($id)
    {
        $this->load->model('Admin_model');
        $this->Admin_model->deleteSub($id);
        $this->session->set_flashdata('messageDelete', $this->messageDelete());
        redirect('admin/submenu');
    }
    public function deleteMenu($id)
    {
        $this->load->model('Admin_model');
        $this->Admin_model->deleteMenu($id);
        $this->session->set_flashdata('messageDelete', $this->messageDelete());
        redirect('admin/role');
    }
    public function deleteUsers($id)
    {
        $this->load->model('Admin_model');
        $this->Admin_model->deleteUser($id);
        $this->session->set_flashdata('messageDelete', $this->messageDelete());
        redirect('admin/user');
    }

    public function user()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['title'] = 'Pengguna';
        $data['akun'] = $this->db->get('users')->result_array();
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', '%s tidak boleh kosong!');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[users.email]',
            [
                'is_unique' => 'Email ini sudah terdaftar!'
            ]
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/user', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => $this->input->post('level'),
                'is_active' => 1
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('messageAdd', $this->messageAdd());
            redirect('admin/user');
        }
    }
    public function editUser()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['title'] = 'User';
        $data['karyawan'] = $this->db->get('users')->result_array();
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_message('required', '%s tidak boleh kosong!');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/user', $data);
            $this->load->view('templates/footer');
        } else {

            $id = $this->input->post('id');
            $idusers = $this->db->get_where('users', ['id' => $id])->row_array();
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            if ($this->input->post('password') == null) {
                $password = $idusers['password'];
            } else {
                $password = password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                );
            }
            $role_id = $this->input->post('level');
            //jika ada gambar untuk di upload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '4048';
                $config['upload_path']   = './assets/template/dist/img/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {

                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . '/assets/template/dist/img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('name', $name);
            $this->db->set('email', $email);
            $this->db->set('password', $password);
            $this->db->set('role_id', $role_id);
            $this->db->where('id', $id);
            $this->db->update('users');
            $this->session->set_flashdata('messageEdit', $this->messageEdit());
            redirect('admin/user');
        }
    }

    public function pengaturan()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pengaturan Situs';
        $data['gambar'] = $this->db->get_where('tbl_pengaturan_umum')->row_array();
        $this->form_validation->set_rules('namaweb', 'Nama Web', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/pengaturan', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $namaweb = $this->input->post('namaweb');
            $upload_favicon = $_FILES['favicon']['name'];
            if ($upload_favicon) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/template/dist/img/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('favicon')) {
                    $old_image = $data['gambar']['favicon'];
                    if ($old_image != 'favicon.png') {
                        unlink(FCPATH . 'assets/template/dist/img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('favicon', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('namaweb', $namaweb);
            $this->db->where('id', $id);
            $this->db->update('tbl_pengaturan_umum');
            $this->session->set_flashdata('messageEdit', $this->messageEdit());
            redirect('admin/pengaturan');
        }
    }

    public function suratmasuk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Surat Masuk';

        $data['tipe'] = $this->input->post('tipe');
        if ($data['tipe'] == null) {
            $data['penduduk'] = $this->db->get('tbl_data_penduduk')->result_array();
            $this->load->model('Admin_model');
            $data['surat'] = $this->Admin_model->viewSuratMasuk();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/suratmasuk', $data);
            $this->load->view('templates/footer');
        } else {
            $data['penduduk'] = $this->db->get('tbl_data_penduduk')->result_array();
            $this->load->model('Admin_model');
            $data['surat'] = $this->Admin_model->viewSuratMasukTipe($data['tipe']);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/suratmasuk', $data);
            $this->load->view('templates/footer');
        }
    }
    public function suratkeluar()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Surat Keluar';
        $data['tipe'] = $this->input->post('tipe');
        if ($data['tipe'] == null) {
            $data['penduduk'] = $this->db->get('tbl_data_penduduk')->result_array();
            $data['SM'] = $this->db->get('tbl_surat_masuk')->result_array();
            $this->load->model('Admin_model');
            $data['surat'] = $this->Admin_model->viewSuratKeluar();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/suratkeluar', $data);
            $this->load->view('templates/footer');
        } else {
            $data['penduduk'] = $this->db->get('tbl_data_penduduk')->result_array();
            $data['SM'] = $this->db->get('tbl_surat_masuk')->result_array();
            $this->load->model('Admin_model');
            $data['surat'] = $this->Admin_model->viewSuratKeluarTipe($data['tipe']);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/suratkeluar', $data);
            $this->load->view('templates/footer');
        }
    }

    public function addSuratMasuk()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'nik' => $this->input->post('nik'),
            'tipe_surat' => $this->input->post('tipe'),
            'nomor_surat' => $this->input->post('nomorSurat'),
            'tanggal_surat' => $this->input->post('tanggalSurat'),
            'asal_surat' => $this->input->post('asalSurat'),
            'perihal' => $this->input->post('perihal'),
            'ringkasan' => $this->input->post('ringkasan'),
        ];
        $upload_favicon = $_FILES['file']['name'];
        if ($upload_favicon) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']      = '9048';
            $config['upload_path']   = './assets/uploads/suratmasuk/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $old_image = $data['gambar']['file'];
                if ($old_image != 'favicon.png') {
                    unlink(FCPATH . 'assets/uploads/suratmasuk/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('file_surat', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->insert('tbl_surat_masuk', $data);
        $this->session->set_flashdata('messageAdd', $this->messageAdd());
        redirect('admin/suratMasuk');
    }
    public function editSuratMasuk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Surat Masuk';
        $idsurat = $this->input->get('surat');
        $data['surat'] = $this->db->get_where('tbl_surat_masuk', ['no_agenda' => $idsurat])->row_array();
        $data['penduduk'] = $this->db->get('tbl_data_penduduk')->result_array();
        if ($data['surat'] == null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/error-404', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/editsuratmasuk', $data);
            $this->load->view('templates/footer');
        }
    }
    public function updateSuratMasuk()
    {
        $idsurat = $this->input->get('surat');
        $data = [
            'nik' => $this->input->post('nik'),
            'tipe_surat' => $this->input->post('tipe'),
            'nomor_surat' => $this->input->post('nomorSurat'),
            'tanggal_surat' => $this->input->post('tanggalSurat'),
            'asal_surat' => $this->input->post('asalSurat'),
            'perihal' => $this->input->post('perihal'),
            'ringkasan' => $this->input->post('ringkasan'),
            'status' => 0,
        ];
        $upload_favicon = $_FILES['file']['name'];
        if ($upload_favicon) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']      = '9048';
            $config['upload_path']   = './assets/uploads/suratmasuk/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $old_file = $data['gambar']['file'];
                if ($old_file != 'favicon.png') {
                    unlink(FCPATH . 'assets/uploads/suratmasuk/' . $old_file);
                }
                $new_file = $this->upload->data('file_name');
                $this->db->set('file_surat', $new_file);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->where('no_agenda', $idsurat);
        $this->db->update('tbl_surat_masuk', $data);
        $this->session->set_flashdata('messageEdit', $this->messageEdit());
        redirect('admin/suratMasuk');
    }
    public function deleteAllSuratMasuk()
    {
        if (isset($_POST['deleteselect'])) {
            if (!empty($this->input->post('check_value'))) {
                $checkpost = $this->input->post('check_value');
                $checkid = [];
                foreach ($checkpost as $cp) {
                    array_push($checkid, $cp);
                }
                $this->load->model('Admin_model');
                $this->Admin_model->deleteSelectSuratMasuk($checkid);
                $this->session->set_flashdata('messageDelete', $this->messageDelete());
                redirect('admin/suratmasuk');
            } else {
                $this->session->set_flashdata('messageNoSelect', $this->messageNoSelect());
                redirect('admin/suratmasuk');
            }
        }
        $status = 'Error 500';
        echo json_encode($status);
    }
    public function reportSuratMasuk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['range'] = $this->input->post('report');
        $this->load->view('admin/reportmasuk', $data);
    }
    public function reportSuratKeluar()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['range'] = $this->input->post('report');
        $date = date('Y-m-d');
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split      = explode('-', $date);
        $data['tanggal'] = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
        $this->load->view('admin/reportkeluar', $data);
    }

    public function addSuratKeluar()
    {
        $data = [
            'nik' => $this->input->post('nik'),
            'tipe_surat' => $this->input->post('tipe'),
            'nomor_surat_masuk' => $this->input->post('suratmasuk'),
            'nomor_surat' => $this->input->post('nomorSurat'),
            'tanggal_surat' => $this->input->post('tanggalSurat'),
            'tujuan_surat' => $this->input->post('tujuanSurat'),
            'perihal' => $this->input->post('perihal'),
            'ringkasan' => $this->input->post('ringkasan'),
        ];
        $upload_favicon = $_FILES['file']['name'];
        if ($upload_favicon) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']      = '9048';
            $config['upload_path']   = './assets/uploads/suratkeluar/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $old_file = $data['gambar']['file'];
                if ($old_file != 'favicon.png') {
                    unlink(FCPATH . 'assets/uploads/suratkeluar/' . $old_file);
                }
                $new_file = $this->upload->data('file_name');
                $this->db->set('file_surat', $new_file);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->insert('tbl_surat_keluar', $data);
        $this->session->set_flashdata('messageAdd', $this->messageAdd());
        redirect('admin/suratKeluar');
    }
    public function editSuratKeluar()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Surat Keluar';
        $idsurat = $this->input->get('surat');
        $data['surat'] = $this->db->get_where('tbl_surat_keluar', ['no_agenda' => $idsurat])->row_array();
        $data['penduduk'] = $this->db->get('tbl_data_penduduk')->result_array();
        $data['SM'] = $this->db->get('tbl_surat_masuk')->result_array();
        if ($data['surat'] == null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/error-404', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/editsuratkeluar', $data);
            $this->load->view('templates/footer');
        }
    }
    public function updateSuratKeluar()
    {
        $idsurat = $this->input->get('surat');
        $data = [
            'nik' => $this->input->post('nik'),
            'tipe_surat' => $this->input->post('tipe'),
            'nomor_surat_masuk' => $this->input->post('suratmasuk'),
            'nomor_surat' => $this->input->post('nomorSurat'),
            'tanggal_surat' => $this->input->post('tanggalSurat'),
            'tujuan_surat' => $this->input->post('tujuanSurat'),
            'perihal' => $this->input->post('perihal'),
            'ringkasan' => $this->input->post('ringkasan'),
        ];
        $upload_favicon = $_FILES['file']['name'];
        if ($upload_favicon) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']      = '9048';
            $config['upload_path']   = './assets/uploads/suratkeluar/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $old_image = $data['gambar']['file'];
                if ($old_image != 'favicon.png') {
                    unlink(FCPATH . 'assets/uploads/suratkeluar/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('file_surat', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->where('no_agenda', $idsurat);
        $this->db->update('tbl_surat_keluar', $data);
        $this->session->set_flashdata('messageEdit', $this->messageEdit());
        redirect('admin/suratKeluar');
    }
    public function deleteAllSuratKeluar()
    {
        if (isset($_POST['deleteselect'])) {
            if (!empty($this->input->post('check_value'))) {
                $checkpost = $this->input->post('check_value');
                $checkid = [];
                foreach ($checkpost as $cp) {
                    array_push($checkid, $cp);
                }
                $this->load->model('Admin_model');
                $this->Admin_model->deleteSelectSuratKeluar($checkid);
                $this->session->set_flashdata('messageDelete', $this->messageDelete());
                redirect('admin/suratkeluar');
            } else {
                $this->session->set_flashdata('messageNoSelect', $this->messageNoSelect());
                redirect('admin/suratkeluar');
            }
        }
        $status = 'Error 500';
        echo json_encode($status);
    }
    public function dataPenduduk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Penduduk';
        $data['penduduk'] = $this->db->get('tbl_data_penduduk')->result_array();
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
            $this->load->view('admin/datapenduduk', $data);
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
            ];
            $this->db->insert('tbl_data_penduduk', $data);
            $this->session->set_flashdata('messageAdd', $this->messageAdd());
            redirect('admin/dataPenduduk');
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
    //     redirect('admin/dataPenduduk');
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
                redirect('admin/dataPenduduk');
            } else {
                $this->session->set_flashdata('messageNoSelect', $this->messageNoSelect());
                redirect('admin/dataPenduduk');
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
        if ($data['penduduk'] == null) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/error-404', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/editpenduduk', $data);
            $this->load->view('templates/footer');
        }
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
        redirect('admin/dataPenduduk');
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
        $this->load->view('admin/viewdata', $data);
        $this->load->view('templates/footer');
    }
    function deleteAllUser()
    {
        if (isset($_POST['deleteselect'])) {
            if (!empty($this->input->post('check_value'))) {
                $checkpost = $this->input->post('check_value');
                $checkid = [];
                foreach ($checkpost as $cp) {
                    array_push($checkid, $cp);
                }
                $this->load->model('Admin_model');
                $this->Admin_model->deleteSelectUser($checkid);
                $this->session->set_flashdata('messageDelete', $this->messageDelete());
                redirect('admin/user');
            } else {
                $this->session->set_flashdata('messageNoSelect', $this->messageNoSelect());
                redirect('admin/user');
            }
        }
        $status = 'Error 500';
        echo json_encode($status);
    }
    public function laporan()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Laporan';
        $data['periode'] = $this->input->get('periode');
        $data['periode1'] = $this->input->post('year');
        $data['tipe'] = $this->input->post('surat');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/laporansurat', $data);
        $this->load->view('templates/footer_chart');
    }
    public function cetakansurat()
    {
        $data = [
            'tahun' => $this->input->post('year'),
            'bulan' => $this->input->post('bulan'),
            'surat' => $this->input->post('surat')
        ];
        if ($data['surat'] == 1) {
            $this->load->view('admin/periodesuratmasuk', $data);
        } else {
            $this->load->view('admin/periodesuratkeluar', $data);
        }
    }
    public function pupuk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pupuk';
        $data['pupuk'] = $this->db->get('tbl_pupuk')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/pupuk', $data);
        $this->load->view('templates/footer', $data);
    }
}
ini_set('display_errors', 'off');
