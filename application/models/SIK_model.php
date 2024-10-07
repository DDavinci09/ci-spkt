<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SIK_model extends CI_Model
{
    public function getAllSIK()
    {
        $this->db->join('tb_pelapor', 'tb_sik.id_pelapor = tb_pelapor.id_pelapor');
		return $this->db->get('tb_sik')->result_array();
    }
    
    public function gettotalAllSIK()
    {
		return $this->db->get('tb_sik')->num_rows();
    }

    public function getAllSIKPelapor()
    {
        $this->db->join('tb_pelapor', 'tb_sik.id_pelapor = tb_pelapor.id_pelapor');
        $this->db->where(['tb_sik.id_pelapor' => $this->session->userdata('id_pelapor')]);
		return $this->db->get('tb_sik')->result_array();
    }

    public function getSIKbyId($id_sik)
    {
        return $this->db->get_where('tb_sik', ['id_sik' => $id_sik])->row_array();
    }
    
    public function getSIKbyId2($id_sik)
    {
        $this->db->join('tb_pelapor', 'tb_sik.id_pelapor = tb_pelapor.id_pelapor');
        return $this->db->get_where('tb_sik', ['id_sik' => $id_sik])->row_array();
    }

    public function hapus($id_sik)
    {
        $this->db->delete('tb_sik', ['id_sik' => $id_sik]);
    }

    public function tambahfile($file)
    {
        $data = [
            "id_pelapor" => $this->input->post('id_pelapor', true),
            "kode_sik" => $this->input->post('kode_sik', true),
            "tgl_sik" => $this->input->post('tanggal_sik', true),
            "nama_kegiatan" => $this->input->post('nama_kegiatan', true),
            "tujuan_kegiatan" => $this->input->post('tujuan_kegiatan', true),
            "organisasi" => $this->input->post('organisasi', true),
            "penanggungjawab" => $this->input->post('penanggungjawab', true),
            "waktu_kegiatan" => $this->input->post('waktu_kegiatan', true),
            "tempat_kegiatan" => $this->input->post('tempat_kegiatan', true),
            "status_sik" => $this->input->post('status_sik', true),
            "dokumen" => $file['file_name']
        ];

        $this->db->insert('tb_sik', $data);
    }

    public function editfile($file)
    {
        $data = [
            "tgl_sik" => $this->input->post('tanggal_sik', true),
            "nama_kegiatan" => $this->input->post('nama_kegiatan', true),
            "tujuan_kegiatan" => $this->input->post('tujuan_kegiatan', true),
            "organisasi" => $this->input->post('organisasi', true),
            "penanggungjawab" => $this->input->post('penanggungjawab', true),
            "waktu_kegiatan" => $this->input->post('waktu_kegiatan', true),
            "tempat_kegiatan" => $this->input->post('tempat_kegiatan', true),
            "dokumen" => $file['file_name']
        ];

        $this->db->where('id_sik', $this->input->post('id_sik'));
        $this->db->update('tb_sik', $data);
    }
    
    public function edit()
    {
        $data = [
            "tgl_sik" => $this->input->post('tanggal_sik', true),
            "nama_kegiatan" => $this->input->post('nama_kegiatan', true),
            "tujuan_kegiatan" => $this->input->post('tujuan_kegiatan', true),
            "organisasi" => $this->input->post('organisasi', true),
            "penanggungjawab" => $this->input->post('penanggungjawab', true),
            "waktu_kegiatan" => $this->input->post('waktu_kegiatan', true),
            "tempat_kegiatan" => $this->input->post('tempat_kegiatan', true)
        ];
        
        $this->db->where('id_sik', $this->input->post('id_sik'));
        $this->db->update('tb_sik', $data);
    }
    
    public function tambah($file)
    {
        $data = [
            "id_pelapor" => $this->input->post('id_pelapor', true),
            "tgl_lp" => $this->input->post('tgl_lp', true),
            "jenis_lp" => $this->input->post('jenis_lp', true),
            "isi_lp" => $this->input->post('isi_lp', true),
            "waktu_kejadian" => $this->input->post('waktu_kejadian', true),
            "tempat_kejadian" => $this->input->post('tempat_kejadian', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->insert('tb_lp', $data);
    }

    public function autoKD()
    {
        // Get the maximum code from the barang table
        $query = $this->db->query("SELECT MAX(kode_sik) as kodeTerbesar FROM tb_sik");
        $data = $query->row_array();
        $kodeSIK = $data['kodeTerbesar'];

        // Extract the numeric part of the code and convert it to an integer
        $urutan = (int) substr($kodeSIK, 3, 3);

        // Increment the number to determine the next sequence
        $urutan++;

        // Form the new barang code
        $huruf = "SIK";
        $kodeSIK = $huruf . sprintf("%03s", $urutan);

        return $kodeSIK;
    }

}