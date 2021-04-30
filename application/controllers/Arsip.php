<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard Arsip';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('arsip/index', $data);
        $this->load->view('templates/footer');
    }
    public function suratmasuk()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat'] = $this->db->get('surat_masuk')->result_array();

        $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal Surat', 'required');


        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('arsip/suratmasuk', $data);
            $this->load->view('templates/footer');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/surat_masuk/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['surat_masuk']['berkas_surat'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/surat_masuk/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('berkas_surat', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $data = [
                'no_surat' => $this->input->post('no_surat'),
                'tgl_surat' => $this->input->post('tgl_surat'),
                'perihal' => $this->input->post('perihal'),
                'id_jenis_surat' => $this->input->post('id_jenis_surat'),
                'pengirim' => $this->input->post('pengirim'),
                'ditujukan' => $this->input->post('ditujukan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'id_petugas' =>  1,
                'sifat_surat' => $this->input->post('sifat_surat'),
                'status_disposisi' => 0,
                'dibuat_pada' => time()
            ];

            $this->db->insert('surat_masuk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Masuk ditambahkan!</div>');
            redirect('arsip/suratmasuk');
        }
    }

    public function deletsuratmasuk()
    {

        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat'] = $this->db->get('surat_masuk')->result_array();
        $this->form_validation->set_rules('id', 'Id', 'required');
        $balasid = $this->input->post('id');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('arsip/suratmasuk', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $this->db->delete('surat_masuk', ['id' => $balasid]);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Surat Masuk berhasil dihapus!</div>');
            redirect('arsip/suratmasuk');
        }
    }

    public function suratkeluar()
    {
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surat/suratkeluar', $data);
        $this->load->view('templates/footer');
    }

    public function disposisisurat()
    {
        $data['title'] = 'Disposisi Surat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('arsip/disposisisurat', $data);
        $this->load->view('templates/footer');
    }
}
