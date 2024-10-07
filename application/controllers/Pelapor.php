<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelapor extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['Pelapor'] = $this->Pelapor_model->gettotalAllPelapor();
        $data['LP'] = $this->LP_model->gettotalAllLP();
        $data['SK'] = $this->SKTLK_model->gettotalAllSKTLK();
        $data['SIK'] = $this->SIK_model->gettotalAllSIK();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarPelapor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Pelapor/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarPelapor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Pelapor/myprofile', $data);
        $this->load->view('templates/footer');
    }

    public function LP()
    {
        $data['title'] = 'Laporan Polisi (LP) ';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['LP'] = $this->LP_model->getAllLPPelapor();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarPelapor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('lp/index', $data);
        $this->load->view('templates/footer');
    }

    public function SKTLK()
    {
        $data['title'] = 'Surat Keterangan Tanda Laporan Kehilangan (SKTLK) ';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['SKTLK'] = $this->SKTLK_model->getAllSKTLKPelapor();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarPelapor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sktlk/index', $data);
        $this->load->view('templates/footer');
    }

    public function SIK()
    {
        $data['title'] = 'Surat Ijin Keramaian (SIK) ';
        $data['user'] = $this->db->get_where('tb_pelapor', ['username' => $this->session->userdata('username')])->row_array();
        $data['SIK'] = $this->SIK_model->getAllSIKPelapor();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarPelapor', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sik/index', $data);
        $this->load->view('templates/footer');
    }
}