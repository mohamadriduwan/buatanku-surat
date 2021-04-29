<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Izin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard Izin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['JumlahSurat'] = $this->db->get('surat_penelitian')->num_rows();
        $data['JumlahSuket'] = $this->db->get_where('surat_penelitian', ['is_active' => 1])->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('izin/index', $data);
        $this->load->view('templates/footer');
    }

    public function suratbalasan()
    {
        $data['title'] = 'Surat Balasan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['izin'] = $this->db->get('surat_penelitian')->result_array();

        $this->form_validation->set_rules('penulis', 'penulis', 'required');
        $this->form_validation->set_rules('asal_surat', 'asal_surat', 'required');
        $this->form_validation->set_rules('nomor_asal', 'nomor_asal', 'required');
        $this->form_validation->set_rules('tanggal_asal', 'tanggal_asal', 'required');
        $this->form_validation->set_rules('nama_mahasiswa', 'nama_mahasiswa', 'required');
        $this->form_validation->set_rules('nim_mahasiswa', 'nim_mahasiswa', 'required');
        $this->form_validation->set_rules('fakultas', 'fakultas');
        $this->form_validation->set_rules('jurusan', 'jurusan');
        $this->form_validation->set_rules('prodi', 'prodi');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        $this->form_validation->set_rules('judul_skripsi', 'judul_skripsi', 'required');
        $this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');



        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('izin/suratbalasan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'penulis' => $this->input->post('penulis'),
                'asal_surat' => $this->input->post('asal_surat'),
                'nomor_asal' => $this->input->post('nomor_asal'),
                'tanggal_asal' => $this->input->post('tanggal_asal'),
                'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
                'nim_mahasiswa' => $this->input->post('nim_mahasiswa'),
                'fakultas' => $this->input->post('fakultas'),
                'jurusan' => $this->input->post('jurusan'),
                'prodi' => $this->input->post('prodi'),
                'no_hp' => $this->input->post('no_hp'),
                'judul_skripsi' => $this->input->post('judul_skripsi'),
                'nomor_surat' => $this->input->post('nomor_surat'),
                'tanggal_surat' => $this->input->post('tanggal_surat')

            ];
            $this->db->insert('surat_penelitian', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Surat Balasan added!</div>');
            redirect('izin/suratbalasan');
        }
    }

    public function balasanDelet()
    {

        $data['title'] = 'Surat Balasan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['izin'] = $this->db->get('surat_penelitian')->result_array();
        $this->form_validation->set_rules('id', 'Id', 'required');
        $balasid = $this->input->post('id');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('izin/index', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $this->db->delete('surat_penelitian', ['id' => $balasid]);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Surat Balasan Deleted!</div>');
            redirect('izin/suratbalasan');
        }
    }



    public function balasanedit()
    {
        $data['title'] = 'Surat Balasan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['izin'] = $this->db->get('surat_penelitian')->result_array();
        $this->form_validation->set_rules('id', 'Id', 'required');

        $this->form_validation->set_rules('penulis', 'penulis', 'required');
        $this->form_validation->set_rules('asal_surat', 'asal_surat', 'required');
        $this->form_validation->set_rules('nomor_asal', 'nomor_asal', 'required');
        $this->form_validation->set_rules('tanggal_asal', 'tanggal_asal', 'required');
        $this->form_validation->set_rules('nama_mahasiswa', 'nama_mahasiswa', 'required');
        $this->form_validation->set_rules('nim_mahasiswa', 'nim_mahasiswa', 'required');
        $this->form_validation->set_rules('fakultas', 'fakultas');
        $this->form_validation->set_rules('jurusan', 'jurusan');
        $this->form_validation->set_rules('prodi', 'prodi');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        $this->form_validation->set_rules('judul_skripsi', 'judul_skripsi', 'required');
        $this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');

        $penulis = $this->input->post('penulis');
        $asal_surat = $this->input->post('asal_surat');
        $nomor_asal = $this->input->post('nomor_asal');
        $tanggal_asal = $this->input->post('tanggal_asal');
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $nim_mahasiswa = $this->input->post('nim_mahasiswa');
        $fakultas = $this->input->post('fakultas');
        $jurusan = $this->input->post('jurusan');
        $prodi = $this->input->post('prodi');
        $no_hp = $this->input->post('no_hp');
        $nomor_surat = $this->input->post('nomor_surat');
        $judul_skripsi = $this->input->post('judul_skripsi');
        $balasid = $this->input->post('id');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('izin/index', $data);
            $this->load->view('templates/footer');
        } else {

            $this->db->set('penulis', $penulis);
            $this->db->set('asal_surat', $asal_surat);
            $this->db->set('nomor_asal', $nomor_asal);
            $this->db->set('tanggal_asal', $tanggal_asal);
            $this->db->set('nama_mahasiswa', $nama_mahasiswa);
            $this->db->set('nim_mahasiswa', $nim_mahasiswa);
            $this->db->set('fakultas', $fakultas);
            $this->db->set('jurusan', $jurusan);
            $this->db->set('prodi', $prodi);
            $this->db->set('no_hp', $no_hp);
            $this->db->set('nomor_surat', $nomor_surat);
            $this->db->set('judul_skripsi', $judul_skripsi);
            $this->db->where('id', $balasid);
            $this->db->update('surat_penelitian');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Balasan Surat Edited!</div>');
            redirect('izin/suratbalasan');
        }
    }


    public function cetakbalasan($id)
    {

        $data['title'] = 'Surat Balasan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['izin'] = $this->db->get_where('surat_penelitian', ['id' => $id])->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('izin/cetakbalasan', $data);
        } else {
            $id = $this->input->post('id');

            redirect('izin/suratbalasan');
        }
    }

    public function selesai()
    {
        $data['title'] = 'Surat Selesai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['izin'] = $this->db->get('surat_penelitian')->result_array();

        $this->form_validation->set_rules('no_suket', 'no_suket', 'required');
        $this->form_validation->set_rules('awal_penelitian', 'awal_penelitian', 'required');
        $this->form_validation->set_rules('akhir_penelitian', 'akhir_penelitian', 'required');

        $no_suket = $this->input->post('no_suket');
        $awal_penelitian = $this->input->post('awal_penelitian');
        $akhir_penelitian = $this->input->post('akhir_penelitian');
        $is_active = $this->input->post('is_active');
        $tanggal_suket = $this->input->post('tanggal_suket');
        $balasid = $this->input->post('id');



        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('izin/selesai', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('no_suket', $no_suket);
            $this->db->set('awal_penelitian', $awal_penelitian);
            $this->db->set('akhir_penelitian', $akhir_penelitian);
            $this->db->set('is_active', $is_active);
            $this->db->set('tanggal_suket', $tanggal_suket);
            $this->db->where('id', $balasid);
            $this->db->update('surat_penelitian');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Keterangan telah dibuat!</div>');
            redirect('izin/selesai');
        }
    }

    public function editsurat()
    {
        $data['title'] = 'Surat Keterangan Penelitian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['izin'] = $this->db->get('surat_penelitian')->result_array();

        $this->form_validation->set_rules('no_suket', 'no_suket', 'required');
        $this->form_validation->set_rules('awal_penelitian', 'awal_penelitian', 'required');
        $this->form_validation->set_rules('akhir_penelitian', 'akhir_penelitian', 'required');

        $no_suket = $this->input->post('no_suket');
        $awal_penelitian = $this->input->post('awal_penelitian');
        $akhir_penelitian = $this->input->post('akhir_penelitian');
        $balasid = $this->input->post('id');



        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('izin/selesai', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('no_suket', $no_suket);
            $this->db->set('awal_penelitian', $awal_penelitian);
            $this->db->set('akhir_penelitian', $akhir_penelitian);
            $this->db->where('id', $balasid);
            $this->db->update('surat_penelitian');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Keterangan telah diEdit!</div>');
            redirect('izin/selesai');
        }
    }

    public function cetaksuket($id)
    {

        $data['title'] = 'Surat Keterangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['izin'] = $this->db->get_where('surat_penelitian', ['id' => $id])->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('izin/cetaksuket', $data);
        } else {
            $id = $this->input->post('id');

            redirect('izin/cetaksuket');
        }
    }
}
