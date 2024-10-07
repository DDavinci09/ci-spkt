
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SIK extends CI_Controller
{
    public function tambah()
    {
        $data['title'] = 'Tambah Data SIK';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['autoKD'] = $this->SIK_model->autoKD();

        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('tujuan_kegiatan', 'Tujuan Kegiatan', 'required');
        $this->form_validation->set_rules('penanggungjawab', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('organisasi', 'Organisasi', 'required');
        $this->form_validation->set_rules('waktu_kegiatan', 'Waktu Kegiatan', 'required');
        $this->form_validation->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'required');

        if ($this->form_validation->run() == TRUE) {
            //konfigurasi upload file
            $config['upload_path']    = './assets/upload/buktiSIK';
            $config['allowed_types']  = 'jpg|jpeg|png|PNG|pdf|docx';
            $config['max_size']       = '5048';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $this->SIK_model->tambahfile($this->upload->data());
                redirect('Pelapor/SIK');
            }
            
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarPelapor', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sik/tambah', $data);
            $this->load->view('templates/footer');
        }
    }

    public function Persetujuan($id_sik)
    {
        $data['title'] = 'Persetujuan SIK';
        $data['user'] = $this->db->get_where('tb_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['SIK'] = $this->SIK_model->getSIKbyId($id_sik);

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data2 = array(
                'status_sik' => $this->input->post('status_sik'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->db->where('id_sik', $id_sik);
            $this->db->update('tb_sik', $data2);
            // $this->model_admin->ubah($data,$id);
            // $this->LP_model->persetujuanLP($id_sik);
            
            redirect('Petugas/SIK');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarPetugas', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sik/persetujuan', $data);
            $this->load->view('templates/footer');
        }
       
    }

    public function hapus($id_sik)
    {
        //$this->session->set_flashdata('flash', 'Dihapus');
        $data['id'] = $this->SIK_model->getSIKbyId($id_sik);
        $file = './assets/upload/buktiSIK/' . $data['id']['dokumen'];

        if (is_readable($file) && unlink($file)) {
            $this->SIK_model->hapus($id_sik);
            redirect('Pelapor/SIK');
        } else {
            $this->SIK_model->hapus($id_sik);
            redirect('Pelapor/SIK');
        }
    }
    
    public function hapusPetugas($id_sik)
    {
        //$this->session->set_flashdata('flash', 'Dihapus');
        $data['id'] = $this->SIK_model->getSIKbyId($id_sik);
        $file = './assets/upload/buktiSIK/' . $data['id']['dokumen'];

        if (is_readable($file) && unlink($file)) {
            $this->SIK_model->hapus($id_sik);
            redirect('Petugas/SIK');
        } else {
            $this->SIK_model->hapus($id_sik);
            redirect('Petugas/SIK');
        }
    }

    public function edit($id_sik)
    {
        $data['title'] = 'Edit Data SIK';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['SIK'] = $this->SIK_model->getSIKbyId2($id_sik);

        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('tujuan_kegiatan', 'Tujuan Kegiatan', 'required');
        $this->form_validation->set_rules('penanggungjawab', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('organisasi', 'Organisasi', 'required');
        $this->form_validation->set_rules('waktu_kegiatan', 'Waktu Kegiatan', 'required');
        $this->form_validation->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'required');

        if ($this->form_validation->run() == TRUE) {
            //konfigurasi upload file
            $config['upload_path']    = './assets/upload/buktiSIK';
            $config['allowed_types']  = 'jpg|jpeg|png|PNG|pdf|docx';
            $config['max_size']       = '5048';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $file = './assets/upload/buktiSIK/' . $data['SIK']['dokumen'];

                if (is_readable($file) && unlink($file)) {
                    $this->SIK_model->editfile($this->upload->data());
                    redirect('Pelapor/SIK');
                }
            } else {
                $this->SIK_model->edit();
                redirect('Pelapor/SIK');
            }
            
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarPelapor', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sik/edit', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function editPetugas($id_sik)
    {
        $data['title'] = 'Edit Data SIK';
        $data['user'] = $this->db->get_where('tb_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['SIK'] = $this->SIK_model->getSIKbyId2($id_sik);

        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('tujuan_kegiatan', 'Tujuan Kegiatan', 'required');
        $this->form_validation->set_rules('penanggungjawab', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('organisasi', 'Organisasi', 'required');
        $this->form_validation->set_rules('waktu_kegiatan', 'Waktu Kegiatan', 'required');
        $this->form_validation->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'required');

        if ($this->form_validation->run() == TRUE) {
            //konfigurasi upload file
            $config['upload_path']    = './assets/upload/buktiSIK';
            $config['allowed_types']  = 'jpg|jpeg|png|PNG|pdf|docx';
            $config['max_size']       = '5048';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $file = './assets/upload/buktiSIK/' . $data['SIK']['dokumen'];

                if (is_readable($file) && unlink($file)) {
                    $this->SIK_model->editfile($this->upload->data());
                    redirect('Petugas/SIK');
                }
            } else {
                $this->SIK_model->edit();
                redirect('Petugas/SIK');
            }
            
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarPetugas', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sik/edit', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function detail($id_sik)
    {
        $data['title'] = 'Detail Data SIK';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['SIK'] = $this->SIK_model->getSIKbyId2($id_sik);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarPelapor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sik/detail', $data);
        $this->load->view('templates/footer');
    }
    
    public function detailPetugas($id_sik)
    {
        $data['title'] = 'Detail Data SIK';
        $data['user'] = $this->db->get_where('tb_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['SIK'] = $this->SIK_model->getSIKbyId2($id_sik);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarPetugas', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sik/detail', $data);
        $this->load->view('templates/footer');
    }
    
    public function cetakSIK($id_sik)
    {
        $data['SI'] = $this->SIK_model->getSIKbyId2($id_sik);
        
        $this->load->view('sik/cetak', $data);
    }

    public function laporanSIK()
    {
        $data['SIK'] = $this->SIK_model->getAllSIK();
        
        $this->load->view('sik/laporan', $data);
    }
}