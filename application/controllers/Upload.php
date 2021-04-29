<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // Load database kedua
        $this->db2 = $this->load->database('ijazah', TRUE);
    }

    public function IdEmis()
    {
        $data['title'] = 'Upload IdEmis';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->db2->get('tb_siswa')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('upload/idemis', $data);
        $this->load->view('templates/footer');
    }

    public function uploadId()
    { {
            $data['title'] = 'Preview';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['siswa'] = $this->db2->get('tb_siswa')->result_array();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('upload/preview', $data);
            $this->load->view('templates/footer');
        }
    }
}
