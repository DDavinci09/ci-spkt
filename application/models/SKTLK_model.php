<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SKTLK_model extends CI_Model
{
    public function getAllSKTLK()
    {
        $this->db->join('tb_pelapor', 'tb_sktlk.id_pelapor = tb_pelapor.id_pelapor');
		return $this->db->get('tb_sktlk')->result_array();
    }
    
    public function gettotalAllSKTLK()
    {
		return $this->db->get('tb_sktlk')->num_rows();
    }

    public function getAllSKTLKPelapor()
    {
        $this->db->join('tb_pelapor', 'tb_sktlk.id_pelapor = tb_pelapor.id_pelapor');
        $this->db->where(['tb_sktlk.id_pelapor' => $this->session->userdata('id_pelapor')]);
		return $this->db->get('tb_sktlk')->result_array();
    }

    public function getSKTLKbyId($id_sktlk)
    {
        return $this->db->get_where('tb_sktlk', ['id_sktlk' => $id_sktlk])->row_array();
    }
    
    public function getSKTLKbyId2($id_sktlk)
    {
        $this->db->join('tb_pelapor', 'tb_sktlk.id_pelapor = tb_pelapor.id_pelapor');
        return $this->db->get_where('tb_sktlk', ['id_sktlk' => $id_sktlk])->row_array();
    }
    
    public function hapus($id_sktlk)
    {
        $this->db->delete('tb_sktlk', ['id_sktlk' => $id_sktlk]);
    }
    
    public function tambahfile($file1, $file2)
    {
        $data = [
            "id_pelapor" => $this->input->post('id_pelapor', true),
            "kode_sktlk" => $this->input->post('kode_sktlk', true),
            "tgl_sktlk" => $this->input->post('tanggal_sktlk', true),
            "kejadian" => $this->input->post('kejadian', true),
            "waktu_kejadian" => $this->input->post('waktu_kejadian', true),
            "tempat_kejadian" => $this->input->post('tempat_kejadian', true),
            "status_sktlk" => $this->input->post('status_sktlk', true),
            "bukti" => $file1,
            "dokumen" => $file2
        ];

        $this->db->insert('tb_sktlk', $data);
    }
    
    public function tambah()
    {
        $data = [
            "id_pelapor" => $this->input->post('id_pelapor', true),
            "kode_sktlk" => $this->input->post('kode_sktlk', true),
            "tgl_sktlk" => $this->input->post('tanggal_sktlk', true),
            "jenis_lp" => $this->input->post('jenis_lp', true),
            "isi_lp" => $this->input->post('isi_lp', true),
            "waktu_kejadian" => $this->input->post('waktu_kejadian', true),
            "tempat_kejadian" => $this->input->post('tempat_kejadian', true),
            "status_lp" => $this->input->post('status_lp', true)
        ];

        $this->db->insert('tb_lp', $data);
    }

    public function edit()
    {
        $data = [
            "tgl_sktlk" => $this->input->post('tanggal_sktlk', true),
            "kejadian" => $this->input->post('kejadian', true),
            "waktu_kejadian" => $this->input->post('waktu_kejadian', true),
            "tempat_kejadian" => $this->input->post('tempat_kejadian', true)
        ];

        $this->db->where('id_sktlk', $this->input->post('id_sktlk'));
        $this->db->insert('tb_sktlk', $data);
    }
    
    public function editfile($file1, $file2)
    {
        $data = [
            "tgl_sktlk" => $this->input->post('tanggal_sktlk', true),
            "kejadian" => $this->input->post('kejadian', true),
            "waktu_kejadian" => $this->input->post('waktu_kejadian', true),
            "tempat_kejadian" => $this->input->post('tempat_kejadian', true),
            "bukti" => $file1,
            "dokumen" => $file2
        ];

        $this->db->where('id_sktlk', $this->input->post('id_sktlk'));
        $this->db->update('tb_sktlk', $data);
    }

    public function editfile1($file1)
    {
        $data = [
            "tgl_sktlk" => $this->input->post('tanggal_sktlk', true),
            "kejadian" => $this->input->post('kejadian', true),
            "waktu_kejadian" => $this->input->post('waktu_kejadian', true),
            "tempat_kejadian" => $this->input->post('tempat_kejadian', true),
            "bukti" => $file1
        ];

        $this->db->where('id_sktlk', $this->input->post('id_sktlk'));
        $this->db->update('tb_sktlk', $data);
    }

    public function editfile2($file2)
    {
        $data = [
            "tgl_sktlk" => $this->input->post('tanggal_sktlk', true),
            "kejadian" => $this->input->post('kejadian', true),
            "waktu_kejadian" => $this->input->post('waktu_kejadian', true),
            "tempat_kejadian" => $this->input->post('tempat_kejadian', true),
            "dokumen" => $file2
        ];

        $this->db->where('id_sktlk', $this->input->post('id_sktlk'));
        $this->db->update('tb_sktlk', $data);
    }

    public function persetujuanSKTLK($id_sktlk)
    {
        $data = [
            "keterangan" => $this->input->post('keterangan', true),
            "status_sktlk" => $this->input->post('status_sktlk', true)
        ];

        $this->db->where('id_sktlk', $id_sktlk);
        $this->db->update('tb_sktlk', $data);
    }

    public function autoKD()
    {
        // Get the maximum code from the barang table
        $query = $this->db->query("SELECT MAX(kode_sktlk) as kodeTerbesar FROM tb_sktlk");
        $data = $query->row_array();
        $kodeSKTLK = $data['kodeTerbesar'];

        // Extract the numeric part of the code and convert it to an integer
        $urutan = (int) substr($kodeSKTLK, 3, 3);

        // Increment the number to determine the next sequence
        $urutan++;

        // Form the new barang code
        $huruf = "SKTLK";
        $kodeSKTLK = $huruf . sprintf("%03s", $urutan);

        return $kodeSKTLK;
    }
}