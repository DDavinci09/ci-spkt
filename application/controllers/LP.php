
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LP extends CI_Controller
{
    public function tambah()
    {
        $data['title'] = 'Tambah Data LP';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['autoKD'] = $this->LP_model->autoKD();

        $this->form_validation->set_rules('jenis_lp', 'Jenis Laporan', 'required');
        $this->form_validation->set_rules('tanggal_lp', 'Tanggal Laporan', 'required');
        $this->form_validation->set_rules('isi_lp', 'Isi Laporan', 'required');
        $this->form_validation->set_rules('waktu_kejadian', 'Waktu Kejadian', 'required');
        $this->form_validation->set_rules('tempat_kejadian', 'Tempat Kejadian', 'required');

        if ($this->form_validation->run() == TRUE) {
            //konfigurasi upload file
            $config['upload_path']    = './assets/upload/buktiLP';
            $config['allowed_types']  = 'jpg|jpeg|png|PNG';
            $config['max_size']       = '10000';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $this->LP_model->tambahfile($this->upload->data());
                redirect('Pelapor/LP');
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarPelapor', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lp/tambah', $data);
            $this->load->view('templates/footer');
        }
    }

    public function edit($id_lp)
    {
        $data['title'] = 'Edit Data LP';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['LP'] = $this->LP_model->getLPbyId2($id_lp);

        $this->form_validation->set_rules('jenis_lp', 'Jenis Laporan', 'required');
        $this->form_validation->set_rules('isi_lp', 'Isi Laporan', 'required');
        $this->form_validation->set_rules('waktu_kejadian', 'Waktu Kejadian', 'required');
        $this->form_validation->set_rules('tempat_kejadian', 'Tempat Kejadian', 'required');

        if ($this->form_validation->run() == TRUE) {
            //konfigurasi upload file
            $config['upload_path']    = './assets/upload/buktiLP';
            $config['allowed_types']  = 'jpg|jpeg|png|PNG';
            $config['max_size']       = '10000';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $file = './assets/upload/buktiLP/' . $data['LP']['bukti'];

                if (is_readable($file) && unlink($file)) {
                    $this->LP_model->editfile($this->upload->data());
                    redirect('Pelapor/LP');
                }
            } else {
                $this->LP_model->edit();
                redirect('Pelapor/LP');
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarPelapor', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lp/edit', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function editPetugas($id_lp)
    {
        $data['title'] = 'Edit Data LP';
        $data['user'] = $this->db->get_where('tb_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['LP'] = $this->LP_model->getLPbyId2($id_lp);

        $this->form_validation->set_rules('jenis_lp', 'Jenis Laporan', 'required');
        $this->form_validation->set_rules('isi_lp', 'Isi Laporan', 'required');
        $this->form_validation->set_rules('waktu_kejadian', 'Waktu Kejadian', 'required');
        $this->form_validation->set_rules('tempat_kejadian', 'Tempat Kejadian', 'required');

        if ($this->form_validation->run() == TRUE) {
            //konfigurasi upload file
            $config['upload_path']    = './assets/upload/buktiLP';
            $config['allowed_types']  = 'jpg|jpeg|png|PNG';
            $config['max_size']       = '10000';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $file = './assets/upload/buktiLP/' . $data['LP']['bukti'];

                if (is_readable($file) && unlink($file)) {
                    $this->LP_model->editfile($this->upload->data());
                    redirect('Petugas/LP');
                }
            } else {
                $this->LP_model->edit();
                redirect('Petugas/LP');
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarPetugas', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lp/edit', $data);
            $this->load->view('templates/footer');
        }
    }

    public function detail($id_lp)
    {
        $data['title'] = 'Detail Data LP';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['LP'] = $this->LP_model->getLPbyId2($id_lp);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarPelapor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('lp/detail', $data);
        $this->load->view('templates/footer');
    }
    
    public function detailPetugas($id_lp)
    {
        $data['title'] = 'Detail Data LP';
        $data['user'] = $this->db->get_where('tb_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['LP'] = $this->LP_model->getLPbyId2($id_lp);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarPetugas', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('lp/detail', $data);
        $this->load->view('templates/footer');
    }

    public function Persetujuan($id_lp)
    {
        $data['title'] = 'Persetujuan LP';
        $data['user'] = $this->db->get_where('tb_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['LP'] = $this->LP_model->getLPbyId($id_lp);

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data2 = array(
                'status_lp' => $this->input->post('status_lp'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->db->where('id_lp', $id_lp);
            $this->db->update('tb_lp', $data2);
            // $this->model_admin->ubah($data,$id);
            // $this->LP_model->persetujuanLP($id_lp);
            
            redirect('Petugas/LP');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarPetugas', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('lp/persetujuan', $data);
            $this->load->view('templates/footer');
        }
       
    }

    public function hapus($id_lp)
    {
        //$this->session->set_flashdata('flash', 'Dihapus');
        $data['id'] = $this->LP_model->getLPbyId($id_lp);
        $file = './assets/upload/buktiLP/' . $data['id']['bukti'];

        if (is_readable($file) && unlink($file)) {
            $this->LP_model->hapus($id_lp);
            redirect('Pelapor/LP');
        } else {
            $this->LP_model->hapus($id_lp);
            redirect('Pelapor/LP');
        }
    }
    
    public function hapusPetugas($id_lp)
    {
        //$this->session->set_flashdata('flash', 'Dihapus');
        $data['id'] = $this->LP_model->getLPbyId($id_lp);
        $file = './assets/upload/buktiLP/' . $data['id']['bukti'];

        if (is_readable($file) && unlink($file)) {
            $this->LP_model->hapus($id_lp);
            redirect('Petugas/LP');
        } else {
            $this->LP_model->hapus($id_lp);
            redirect('Petugas/LP');
        }
    }

    public function cetakLP($id_lp)
    {
        $data['LP'] = $this->LP_model->getLPbyId2($id_lp);
        
        $this->load->view('lp/cetak', $data);
    }

    public function laporanLP()
    {
        $data['LP'] = $this->LP_model->getAllLP();
        
        $this->load->view('lp/laporan', $data);
    }
}