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
            $idusers = $this->db->get_where('users', ['id_user' => $id])->row_array();
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
            $this->db->where('id_user', $id);
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
    // ===================================================
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

    public function tambahpupuk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pupuk';
        $data['pupuk'] = $this->db->get('tbl_pupuk')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/tambahpupuk', $data);
        $this->load->view('templates/footer', $data);
    }
    public function addpupuk()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'jenis' => $this->input->post('jenis'),
            'stok' => $this->input->post('stok'),
            'keterangan' => $this->input->post('keterangan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'informasi' => $this->input->post('informasi'),
        ];
        $upload_favicon = $_FILES['file']['name'];
        if ($upload_favicon) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']      = '9048';
            $config['upload_path']   = './assets/template/dist/img/pupuk/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $old_image = $data['gambar']['file'];
                if ($old_image != 'favicon.png') {
                    unlink(FCPATH . '/assets/template/dist/img/pupuk/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->insert('tbl_pupuk', $data);
        $this->session->set_flashdata('messageAdd', $this->messageAdd());
        redirect('admin/pupuk');
    }
    public function deleteAllPupuk()
    {
        if (isset($_POST['deleteselect'])) {
            if (!empty($this->input->post('check_value'))) {
                $checkpost = $this->input->post('check_value');
                $checkid = [];
                foreach ($checkpost as $cp) {
                    array_push($checkid, $cp);
                }
                $this->load->model('Admin_model');
                $this->Admin_model->deleteSelectPupuk($checkid);
                $this->session->set_flashdata('messageDelete', $this->messageDelete());
                redirect('admin/pupuk');
            } else {
                $this->session->set_flashdata('messageNoSelect', $this->messageNoSelect());
                redirect('admin/pupuk');
            }
        }
        $status = 'Error 500';
        echo json_encode($status);
    }
    public function editPupuk()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pupuk';
        $id = $this->input->get('pupuk');
        $data['pupuk'] = $this->db->get_where('tbl_pupuk', ['id_pupuk' => $id])->row_array();
        // var_dump($data['pupuk']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/editpupuk', $data);
        $this->load->view('templates/footer', $data);
    }
    public function editDataPupuk()
    {
        $id = $this->input->get('pupuk');
        $data = [
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'jenis' => $this->input->post('jenis'),
            'stok' => $this->input->post('stok'),
            'keterangan' => $this->input->post('keterangan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'informasi' => $this->input->post('informasi'),
        ];
        $upload_favicon = $_FILES['file']['name'];
        if ($upload_favicon) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']      = '9048';
            $config['upload_path']   = './assets/template/dist/img/pupuk/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $old_image = $data['gambar']['file'];
                if ($old_image != 'favicon.png') {
                    unlink(FCPATH . '/assets/template/dist/img/pupuk/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->where('id_pupuk', $id);
        $this->db->update('tbl_pupuk', $data);
        $this->session->set_flashdata('messageAdd', $this->messageAdd());
        redirect('admin/pupuk');
    }
    public function pembayaran()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pembayaran';
        $this->load->model('Admin_model');
        $data['pembayaran'] = $this->Admin_model->pembayaran();
        // $data['pembayaran'] = $this->db->get('tbl_pembayaran')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detailpembayaran()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pembayaran';
        $id = $this->input->get('data');
        $user = $this->input->get('user');
        $this->load->model('Admin_model');
        $data['chart_pembayaran'] = $this->Admin_model->detailpembayaran($id);
        $data['id_user'] = $this->db->get_where('users', ['id_user' => $user])->row_array();
        $data['pembayaran'] = $this->Admin_model->metodePembayaran($id);
        // var_dump($data['chart_pembayaran']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/detailpembayaran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function updatepembayaran()
    {
        $id = $this->input->get('kode');
        $user = $this->input->get('user');
        $this->load->model('Admin_model');
        $cartbayar = $this->Admin_model->detailpembayaran($id);
        // var_dump($cartbayar);
        // die;
        if ($cartbayar == null) {
            redirect('admin/Error_404');
        } else {
            $pembayaran = [
                'status_pembayaran' => $this->input->post('status'),
            ];
            $this->db->where('id_pembayaran', $id);
            $this->db->update('tbl_pembayaran', $pembayaran);
            foreach ($cartbayar as $data) {
                $pupuk = [
                    'stok' => $data['stok'] - $data['jumlah']
                ];
                $this->db->where('id_pupuk', $data['id_pupuk']);
                $this->db->update('tbl_pupuk', $pupuk);
            }
            $this->session->set_flashdata('messageAdd', $this->messageAdd());
            redirect('admin/pembayaran');
        }
    }
    public function reportPenjualan()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['range'] = $this->input->post('report');
        $this->load->view('admin/reportPenjualan', $data);
    }

    public function bank()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Bank';
        $data['bank'] = $this->db->get('tbl_bank')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/bank', $data);
        $this->load->view('templates/footer', $data);
    }
    public function editBank()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Bank';
        $bank = $this->input->get('bank');
        $data['bank'] = $this->db->get_where('tbl_bank', ['id_bank' => $bank])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/editbank', $data);
        $this->load->view('templates/footer', $data);
    }
    public function updateDataBank()
    {
        $bank = $this->input->get('bank');
        $data = [
            'nama_bank' => $this->input->post('nama'),
            'nama_pemilik' => $this->input->post('atasnama'),
            'nomor_rek' => $this->input->post('rek'),
        ];
        $upload_favicon = $_FILES['file']['name'];
        if ($upload_favicon) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']      = '9048';
            $config['upload_path']   = './assets/template/dist/img/bank/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $old_image = $data['gambar']['file'];
                if ($old_image != 'favicon.png') {
                    unlink(FCPATH . '/assets/template/dist/img/bank/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('logo', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->where('id_bank', $bank);
        $this->db->update('tbl_bank', $data);
        $this->session->set_flashdata('messageEdit', $this->messageEdit());
        redirect('admin/bank');
    }

    public function addbank()
    {
        $data = [
            'nama_bank' => $this->input->post('nama'),
            'nama_pemilik' => $this->input->post('atasnama'),
            'nomor_rek' => $this->input->post('rek'),
        ];
        $upload_favicon = $_FILES['file']['name'];
        if ($upload_favicon) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']      = '9048';
            $config['upload_path']   = './assets/template/dist/img/bank/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $old_image = $data['gambar']['file'];
                if ($old_image != 'favicon.png') {
                    unlink(FCPATH . '/assets/template/dist/img/bank/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('logo', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->insert('tbl_bank', $data);
        $this->session->set_flashdata('messageAdd', $this->messageAdd());
        redirect('admin/bank');
    }
    public function deleteAllBank()
    {
        if (isset($_POST['deleteselect'])) {
            if (!empty($this->input->post('check_value'))) {
                $checkpost = $this->input->post('check_value');
                $checkid = [];
                foreach ($checkpost as $cp) {
                    array_push($checkid, $cp);
                }
                $this->load->model('Admin_model');
                $this->Admin_model->deleteSelectBank($checkid);
                $this->session->set_flashdata('messageDelete', $this->messageDelete());
                redirect('admin/bank');
            } else {
                $this->session->set_flashdata('messageNoSelect', $this->messageNoSelect());
                redirect('admin/bank');
            }
        }
        $status = 'Error 500';
        echo json_encode($status);
    }
    public function deleteAllPetani()
    {
        if (isset($_POST['deleteselect'])) {
            if (!empty($this->input->post('check_value'))) {
                $checkpost = $this->input->post('check_value');
                $checkid = [];
                foreach ($checkpost as $cp) {
                    array_push($checkid, $cp);
                }
                $this->load->model('Admin_model');
                $this->Admin_model->deleteSelectPetani($checkid);
                $this->session->set_flashdata('messageDelete', $this->messageDelete());
                redirect('admin/dataTani');
            } else {
                $this->session->set_flashdata('messageNoSelect', $this->messageNoSelect());
                redirect('admin/dataTani');
            }
        }
        $status = 'Error 500';
        echo json_encode($status);
    }
    public function dataTani()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Petani';
        $this->load->model('Admin_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['akun'] = $this->db->get('users')->result_array();
        // $data['dataTani'] = $this->Admin_model->datapetani();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/datatani', $data);
        $this->load->view('templates/footer', $data);
    }
    public function adddatapetani()
    {
        $length = 9;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        $user = [
            'id_user' => $randomString,
            'name' => $this->input->post('nama'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            ),
            'image' => 'default.jpg',
            'role_id' => 2,
            'is_active' => 1,
            'date_create' => date('d F Y || H:i:s')

        ];
        $this->db->insert('users', $user);
        $data = [
            'id_user' =>  $randomString,
            'nik_petani' => $this->input->post('nik'),
            'nama_petani' => $this->input->post('nama'),
            'provinsi' => $this->input->post('provinsi'),
            'kabupaten' => $this->input->post('kabupaten'),
            'alamat' => $this->input->post('alamat'),
            'kk_petani' => $this->input->post('kk'),
            'luas_lahan' => $this->input->post('luas'),

        ];
        $upload_favicon = $_FILES['file1']['name'];
        if ($upload_favicon) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']      = '9048';
            $config['upload_path']   = './assets/template/dist/img/dokumen/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file1')) {
                $old_image = $data['gambar']['file1'];
                if ($old_image != 'favicon.png') {
                    unlink(FCPATH . '/assets/template/dist/img/dokumen/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('file_kk', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $upload_favicon = $_FILES['file2']['name'];
        if ($upload_favicon) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']      = '9048';
            $config['upload_path']   = './assets/template/dist/img/dokumen/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file2')) {
                $old_image = $data['gambar']['file2'];
                if ($old_image != 'favicon.png') {
                    unlink(FCPATH . '/assets/template/dist/img/dokumen/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('file_ktp', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->insert('tbl_data_petani', $data);
        $this->session->set_flashdata('messageAdd', $this->messageAdd());
        redirect('admin/dataTani');
    }
    public function editpetani()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Petani';
        $id = $this->input->get('data');
        $this->load->model('Admin_model');
        $data['tani'] = $this->Admin_model->datapetani($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/editdatatani', $data);
        $this->load->view('templates/footer', $data);
    }
    public function updatepetani()
    {
        $id = $this->input->get('data');
        $this->load->model('Admin_model');
        $tani = $this->Admin_model->datapetani($id);
        $data = [
            'nik_petani' => $this->input->post('nik'),
            'nama_petani' => $this->input->post('nama'),
            'provinsi' => $this->input->post('provinsi'),
            'kabupaten' => $this->input->post('kabupaten'),
            'alamat' => $this->input->post('alamat'),
            'kk_petani' => $this->input->post('kk'),
            'luas_lahan' => $this->input->post('luas'),

        ];
        $user = [
            'name' => $this->input->post('nama'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            )
        ];
        $upload_favicon = $_FILES['file1']['name'];
        if ($upload_favicon) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']      = '9048';
            $config['upload_path']   = './assets/template/dist/img/dokumen/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file1')) {
                $old_image = $data['gambar']['file1'];
                if ($old_image != 'favicon.png') {
                    unlink(FCPATH . '/assets/template/dist/img/dokumen/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('file_kk', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $upload_favicon = $_FILES['file2']['name'];
        if ($upload_favicon) {
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size']      = '9048';
            $config['upload_path']   = './assets/template/dist/img/dokumen/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file2')) {
                $old_image = $data['gambar']['file2'];
                if ($old_image != 'favicon.png') {
                    unlink(FCPATH . '/assets/template/dist/img/dokumen/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('file_ktp', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->where('id_user', $id);
        $this->db->update('tbl_data_petani', $data);

        if ($user['passsword'] == null) {
            $update = [
                'name' => $this->input->post('nama'),
                'telepon' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'password' => $tani['password'],
            ];
            $this->db->where('id_user', $id);
            $this->db->update('users', $update);
        } else {
            $this->db->where('id_user', $id);
            $this->db->update('users', $user);
        }
        $this->session->set_flashdata('messageEdit', $this->messageEdit());
        redirect('admin/dataTani');
    }
    public function detailpetani()
    {
        $data['pengaturan'] = $this->db->get('tbl_pengaturan_umum')->result_array();
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Petani';
        $id = $this->input->get('data');
        $this->load->model('Admin_model');
        $data['tani'] = $this->Admin_model->datapetani($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/detailpetani', $data);
        $this->load->view('templates/footer', $data);
    }
    // ===================================================
}
ini_set('display_errors', 'off');
