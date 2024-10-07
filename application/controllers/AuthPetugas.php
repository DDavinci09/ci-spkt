<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthPetugas extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'CI Login Page';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('authPetugas/login');
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

        $user = $this->db->get_where('tb_petugas', ['username' => $username])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['status'] == "Aktif") {
                // cek password
                if (password_verify($password, $user['password'])) {
                    // berhasil login
                    $data = [
                        'id_petugas' => $user['id_petugas'],
                        'username' => $user['username'],
                        'nama' => $user['nama'],
                        'level' => $user['level'],
                        'status' => $user['status']
                    ];
                    $this->session->set_userdata($data);
                    redirect('Petugas');
                } else {
                    // password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong password!
                    </div>');
                    redirect('authPetugas');
                }
            } else {
                // username tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This username is not been activated!
                </div>');
                redirect('authPetugas');
            }
        } else {
            // username tidak terdatar terdaftar
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            username is not registered!
            </div>');
            redirect('authPetugas');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_petugas.username]', [
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
            $this->load->view('authPetugas/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level' => $this->input->post('level', true),
                'status' => "Aktif"
            ];

            $this->db->insert('tb_petugas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your account has been created. Please Login first
            </div>');
            redirect('authPetugas');
        }
    }

    public function logout()
    {
        session_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out!
        </div>');
        redirect('authPetugas');
    }

    public function blocked()
    {
        $this->load->view('authPetugas/blocked');
    }
}