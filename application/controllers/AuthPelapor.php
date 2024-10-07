<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthPelapor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'CI Login Page';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('authPelapor/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasi success
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_pelapor', ['username' => $username])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['status'] == "Aktif") {
                // cek password
                if (password_verify($password, $user['password'])) {
                    // berhasil login
                    $data = [
                        'id_pelapor' => $user['id_pelapor'],
                        'username' => $user['username'],
                        'nama' => $user['nama'],
                        'status' => $user['status']
                    ];
                    $this->session->set_userdata($data);
                    redirect('Pelapor');
                } else {
                    // password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!
                    </div>');
                    redirect('authPelapor');
                }
            } else {
                // username tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This username is not been activated!
                </div>');
                redirect('authPelapor');
            }
        } else {
            // username tidak terdatar terdaftar
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            username is not registered!
            </div>');
            redirect('authPelapor');
        }
    }

    public function registration2()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_pelapor.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'CI User Registration';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('authPelapor/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'nama' => $this->input->post('nama', true),
                'nik' => $this->input->post('nik', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'no_telp' => $this->input->post('no_telp', true),
                'alamat' => $this->input->post('alamat', true),
                'ktp' => $this->input->post('nama', true),
                'level' => "Pelapor",
                'status' => "Aktif"
            ];

            $this->db->insert('tb_pelapor', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your account has been created. Please Login first
            </div>');
            redirect('authPelapor');
        }
    }
    
    public function registration()
    {
        $data['tittle'] = 'CI User Registration';

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_pelapor.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('authPelapor/registration');
            $this->load->view('templates/auth_footer');
        } else {
            //konfigurasi upload file
            $config['upload_path']    = './assets/upload/KTP';
            $config['allowed_types']  = 'jpg|jpeg|png|PNG';
            $config['max_size']       = '10000';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $this->Pelapor_model->tambahfile($this->upload->data());
                redirect('authPelapor');
            }
        }
    }

    public function logout()
    {
        session_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out!
        </div>');
        redirect('authPelapor');
    }

    public function blocked()
    {
        $this->load->view('authPelapor/blocked');
    }
}