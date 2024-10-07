<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelapor_model extends CI_Model
{
    public function getAllPelapor()
    {
		return $this->db->get('tb_pelapor')->result_array();
    }
    
    public function gettotalAllPelapor()
    {
		return $this->db->get('tb_pelapor')->num_rows();
    }

    public function getAllLPPelapor()
    {
        $this->db->join('tb_pelapor', 'tb_lp.id_pelapor = tb_pelapor.id_pelapor');
        $this->db->where(['tb_lp.id_pelapor' => $this->session->userdata('id_pelapor')]);
		return $this->db->get('tb_lp')->result_array();
    }

    public function getPelaporbyId()
    {
        $this->db->where(['tb_pelapor.id_pelapor' => $this->session->userdata('id_pelapor')]);
        return $this->db->get_where('tb_pelapor', ['id_pelapor' => $id_pelapor])->row_array();
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
    

    //TAMBAH DATA PELAPOR
    public function tambahfile($file)
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'nama' => $this->input->post('nama', true),
            'nik' => $this->input->post('nik', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'no_telp' => $this->input->post('no_telp', true),
            'alamat' => $this->input->post('alamat', true),
            'ktp' => $file['file_name'],
            'level' => "Pelapor",
            'status' => "Aktif"
        ];

        $this->db->insert('tb_pelapor', $data);
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