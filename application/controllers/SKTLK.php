
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SKTLK extends CI_Controller
{
    public function tambah()
    {
        $data['title'] = 'Tambah Data SKTLK';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['autoKD'] = $this->SKTLK_model->autoKD();

        $this->form_validation->set_rules('tanggal_sktlk', 'Tanggal SKTLK', 'required');
        $this->form_validation->set_rules('kejadian', 'Kejadian', 'required');
        $this->form_validation->set_rules('waktu_kejadian', 'Waktu Kejadian', 'required');
        $this->form_validation->set_rules('tempat_kejadian', 'Tempat Kejadian', 'required');

        if ($this->form_validation->run() == TRUE) {
            //konfigurasi upload file
            $config['upload_path']    = './assets/upload/buktiSKTLK';
            $config['allowed_types']  = 'jpg|jpeg|png|PNG|pdf|docx';
            $config['max_size']       = '5048';

            $this->load->library('upload', $config);

            $this->upload->do_upload('userfile1');
            $upload1 = $this->upload->data();
            $file1 = $upload1['file_name'];

            //konfigurasi upload file
            $config2['upload_path']    = './assets/upload/dokumenSKTLK';
            $config2['allowed_types']  = 'jpg|jpeg|png|PNG|pdf|docx';
            $config2['max_size']       = '5048';

            //Initiaze config upload
            $this->upload->initialize($config2);
            $this->upload->do_upload('userfile2');
            $upload2 = $this->upload->data();
            $file2 = $upload2['file_name'];

            $this->SKTLK_model->tambahfile($file1, $file2);
            redirect('Pelapor/SKTLK');
            
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarPelapor', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sktlk/tambah', $data);
            $this->load->view('templates/footer');
        }
    }

    public function Persetujuan($id_sktlk)
    {
        $data['title'] = 'Persetujuan SKTLK';
        $data['user'] = $this->db->get_where('tb_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['SK'] = $this->SKTLK_model->getSKTLKbyId($id_sktlk);

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data2 = array(
                'status_sktlk' => $this->input->post('status_sktlk'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->db->where('id_sktlk', $id_sktlk);
            $this->db->update('tb_sktlk', $data2);
            // $this->model_admin->ubah($data,$id);
            // $this->LP_model->persetujuanLP($id_sktlk);
            
            redirect('Petugas/SKTLK');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarPetugas', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sktlk/persetujuan', $data);
            $this->load->view('templates/footer');
        }
       
    }


    public function hapus($id_sktlk)
    {
        //$this->session->set_flashdata('flash', 'Dihapus');
        $data['id'] = $this->SKTLK_model->getSKTLKbyId($id_sktlk);
        $file1 = './assets/upload/buktiSKTLK/' . $data['id']['bukti'];
        $file2 = './assets/upload/dokumenSKTLK/' . $data['id']['dokumen'];

        if (is_readable($file1) && is_readable($file2)) {
            if (unlink($file1) && unlink($file2)) {
                $this->SKTLK_model->hapus($id_sktlk);
                redirect('Pelapor/SKTLK');
            } else {
                $this->SKTLK_model->hapus($id_sktlk);
                redirect('Pelapor/SKTLK');
            }
        }
    }
    
    public function hapusPetugas($id_sktlk)
    {
        //$this->session->set_flashdata('flash', 'Dihapus');
        $data['id'] = $this->SKTLK_model->getSKTLKbyId($id_sktlk);
        $file1 = './assets/upload/buktiSKTLK/' . $data['id']['bukti'];
        $file2 = './assets/upload/dokumenSKTLK/' . $data['id']['dokumen'];

        if (is_readable($file1) && is_readable($file2)) {
            if (unlink($file1) && unlink($file2)) {
                $this->SKTLK_model->hapus($id_sktlk);
                redirect('Petugas/SKTLK');
            } else {
                $this->SKTLK_model->hapus($id_sktlk);
                redirect('Petugas/SKTLK');
            }
        }
    }

    public function edit($id_sktlk)
    {
        $data['title'] = 'Edit Data SKTLK';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['SK'] = $this->SKTLK_model->getSKTLKbyId2($id_sktlk);

        $this->form_validation->set_rules('kejadian', 'Kejadian', 'required');
        $this->form_validation->set_rules('waktu_kejadian', 'Waktu Kejadian', 'required');
        $this->form_validation->set_rules('tempat_kejadian', 'Tempat Kejadian', 'required');

        if ($this->form_validation->run() == TRUE) {
            // Fetch existing file names
            $existing_file1 = $data['SK']['bukti'];
            $existing_file2 = $data['SK']['dokumen'];
            // Handle file 1
            $file1 = $this->upload_file('userfile1', './assets/upload/buktiSKTLK', $existing_file1);

            // Handle file 2
            $file2 = $this->upload_file('userfile2', './assets/upload/dokumenSKTLK', $existing_file2);

            if ($file1 && $file2) {
                // Update SKTLK data including the file names in the database
                $this->SKTLK_model->editfile($file1, $file2);
                redirect('Pelapor/SKTLK');
            } else if ($file1) {
                $this->SKTLK_model->editfile1($file1);
                redirect('Pelapor/SKTLK');
            } else if ($file2) {
                $this->SKTLK_model->editfile2($file2);
                redirect('Pelapor/SKTLK');
            } else {
                $this->SKTLK_model->edit();
                redirect('Pelapor/SKTLK');
            }            
        } else {
            // Form validation failed or initial page load, load the edit view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarPelapor', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sktlk/edit', $data); // Load edit view
            $this->load->view('templates/footer');
        }
    }

    public function detail($id_sktlk)
    {
        $data['title'] = 'Detail Data SKTLK';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['SK'] = $this->SKTLK_model->getSKTLKbyId2($id_sktlk);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarPelapor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sktlk/detail', $data); // Load edit view
        $this->load->view('templates/footer');
    }
    
    public function detailPetugas($id_sktlk)
    {
        $data['title'] = 'Detail Data SKTLK';
        $data['user'] = $this->db->get_where('tb_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['SK'] = $this->SKTLK_model->getSKTLKbyId2($id_sktlk);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarPetugas', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sktlk/detail', $data); // Load edit view
        $this->load->view('templates/footer');
    }
    
    public function editPetugas($id_sktlk)
    {
        $data['title'] = 'Edit Data SKTLK';
        $data['user'] = $this->db->get_where('tb_petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['SK'] = $this->SKTLK_model->getSKTLKbyId2($id_sktlk);

        $this->form_validation->set_rules('kejadian', 'Kejadian', 'required');
        $this->form_validation->set_rules('waktu_kejadian', 'Waktu Kejadian', 'required');
        $this->form_validation->set_rules('tempat_kejadian', 'Tempat Kejadian', 'required');

        if ($this->form_validation->run() == TRUE) {
            // Fetch existing file names
            $existing_file1 = $data['SK']['bukti'];
            $existing_file2 = $data['SK']['dokumen'];
            // Handle file 1
            $file1 = $this->upload_file('userfile1', './assets/upload/buktiSKTLK', $existing_file1);

            // Handle file 2
            $file2 = $this->upload_file('userfile2', './assets/upload/dokumenSKTLK', $existing_file2);

            if ($file1 && $file2) {
                // Update SKTLK data including the file names in the database
                $this->SKTLK_model->editfile($file1, $file2);
                redirect('Petugas/SKTLK');
            } else if ($file1) {
                $this->SKTLK_model->editfile1($file1);
                redirect('Petugas/SKTLK');
            } else if ($file2) {
                $this->SKTLK_model->editfile2($file2);
                redirect('Petugas/SKTLK');
            } else {
                $this->SKTLK_model->edit();
                redirect('Petugas/SKTLK');
            }            
        } else {
            // Form validation failed or initial page load, load the edit view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarPetugas', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sktlk/edit', $data); // Load edit view
            $this->load->view('templates/footer');
        }
    }

    private function upload_file($input_name, $folder_path, $existing_file = '')
    {
        // Create a new instance of the upload library for each file upload
        $this->load->library('upload');

        $config['upload_path'] = $folder_path;
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
        $config['max_size'] = '10000'; // Note: Make sure this value is appropriate for your needs
        $this->upload->initialize($config); // Initialize upload configuration

        // Check if file has been uploaded
        if (!empty($_FILES[$input_name]['name'])) {
            // Unlink existing file if provided
            if (!empty($existing_file)) {
                $existing_file_path = $folder_path . '/' . $existing_file;
                if (file_exists($existing_file_path)) {
                    unlink($existing_file_path);
                }
            }

            // Upload new file
            if ($this->upload->do_upload($input_name)) {
                $file_data = $this->upload->data();
                return $file_data['file_name'];
            } else {
                // Handle file upload error
                echo $this->upload->display_errors();
                return ''; // Or handle it according to your application logic
            }
        } else {
            // File not uploaded, return existing file name
            return $existing_file;
        }
    }

    public function cetakSKTLK($id_sktlk)
    {
        $data['SK'] = $this->SKTLK_model->getSKTLKbyId2($id_sktlk);
        
        $this->load->view('sktlk/cetak', $data);
    }
    
    public function laporanSKTLK()
    {
        $data['SKTLK'] = $this->SKTLK_model->getAllSKTLK();
        
        $this->load->view('sktlk/laporan', $data);
    }
}