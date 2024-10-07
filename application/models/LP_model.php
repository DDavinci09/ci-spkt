<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LP_model extends CI_Model
{
    public function getAllLP()
    {
        $this->db->join('tb_pelapor', 'tb_lp.id_pelapor = tb_pelapor.id_pelapor');
		return $this->db->get('tb_lp')->result_array();
    }
    
    public function gettotalAllLP()
    {
        $this->db->join('tb_pelapor', 'tb_lp.id_pelapor = tb_pelapor.id_pelapor');
		return $this->db->get('tb_lp')->num_rows();
    }

    public function getAllLPPelapor()
    {
        $this->db->join('tb_pelapor', 'tb_lp.id_pelapor = tb_pelapor.id_pelapor');
        $this->db->where(['tb_lp.id_pelapor' => $this->session->userdata('id_pelapor')]);
		return $this->db->get('tb_lp')->result_array();
    }

    public function getLPbyId($id_lp)
    {
        return $this->db->get_where('tb_lp', ['id_lp' => $id_lp])->row_array();
    }
    
    public function getLPbyId2($id_lp)
    {
        $this->db->join('tb_pelapor', 'tb_lp.id_pelapor = tb_pelapor.id_pelapor');
        return $this->db->get_where('tb_lp', ['id_lp' => $id_lp])->row_array();
    }

    public function hapus($id_lp)
    {
        $this->db->delete('tb_lp', ['id_lp' => $id_lp]);
    }
    
    public function tambahfile($file)
    {
        $data = [
            "id_pelapor" => $this->input->post('id_pelapor', true),
            "kode_lp" => $this->input->post('kode_lp', true),
            "tgl_lp" =>  $this->input->post('tanggal_lp', true),
            "jenis_lp" => $this->input->post('jenis_lp', true),
            "isi_lp" => $this->input->post('isi_lp', true),
            "waktu_kejadian" => $this->input->post('waktu_kejadian', true),
            "tempat_kejadian" => $this->input->post('tempat_kejadian', true),
            "status_lp" => $this->input->post('status_lp', true),
            "bukti" => $file['file_name']
        ];

        $this->db->insert('tb_lp', $data);
    }

    public function edit()
    {
        $data = [
            "tgl_lp" => $this->input->post('tanggal_lp', true),
            "jenis_lp" => $this->input->post('jenis_lp', true),
            "isi_lp" => $this->input->post('isi_lp', true),
            "waktu_kejadian" => $this->input->post('waktu_kejadian', true),
            "tempat_kejadian" => $this->input->post('tempat_kejadian', true)
        ];
        
        $this->db->where('id_lp', $this->input->post('id_lp'));
        $this->db->update('tb_lp', $data);
    }
    
    public function editfile($file)
    {
        $data = [
            "tgl_lp" => $this->input->post('tanggal_lp', true),
            "jenis_lp" => $this->input->post('jenis_lp', true),
            "isi_lp" => $this->input->post('isi_lp', true),
            "waktu_kejadian" => $this->input->post('waktu_kejadian', true),
            "tempat_kejadian" => $this->input->post('tempat_kejadian', true),
            "bukti" => $file['file_name']
        ];
        
        $this->db->where('id_lp', $this->input->post('id_lp'));
        $this->db->update('tb_lp', $data);
    }
    
    public function tambah()
    {
        $data = [
            "id_pelapor" => $this->input->post('id_pelapor', true),
            "tgl_lp" => date('Y-m-d'),
            "jenis_lp" => $this->input->post('jenis_lp', true),
            "isi_lp" => $this->input->post('isi_lp', true),
            "waktu_kejadian" => $this->input->post('waktu_kejadian', true),
            "tempat_kejadian" => $this->input->post('tempat_kejadian', true),
            "status_lp" => $this->input->post('status_lp', true)
        ];

        $this->db->insert('tb_lp', $data);
    }

    public function persetujuanLP($id_lp)
    {
        $data = [
            "keterangan" => $this->input->post('keterangan', true),
            "status_lp" => $this->input->post('status_lp', true)
        ];

        $this->db->where('id_lp', $id_lp);
        $this->db->update('tb_lp', $data);
    }

    public function autoKD()
    {
        // Get the maximum code from the barang table
        $query = $this->db->query("SELECT MAX(kode_lp) as kodeTerbesar FROM tb_lp");
        $data = $query->row_array();
        $kodeLP = $data['kodeTerbesar'];

        // Extract the numeric part of the code and convert it to an integer
        $urutan = (int) substr($kodeLP, 3, 3);

        // Increment the number to determine the next sequence
        $urutan++;

        // Form the new barang code
        $huruf = "LP";
        $kodeLP = $huruf . sprintf("%03s", $urutan);

        return $kodeLP;
    }
}