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
        $data['jenissurat'] = $this->db->get('jenis_surat')->result_array();


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
                'id_jenis_surat' => $this->input->post('jenis_surat'),
                'id_petugas' =>  $this->input->post('userid'),
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
        $old_image = $this->db->get_where('surat_masuk', ['id' => $balasid])->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('arsip/suratmasuk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->delete('surat_masuk', ['id' => $balasid]);
            unlink(base_url('assets/img/surat_masuk/' . $old_image['berkas_surat']));
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Surat Masuk berhasil dihapus!</div>');
            redirect('arsip/suratmasuk');
        }
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

    public function jenissurat()
    {
        $data['title'] = 'Jenis Surat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jenissurat'] = $this->db->get('jenis_surat')->result_array();

        $this->form_validation->set_rules('jenis_surat', 'Jenis Surat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('arsip/jenissurat', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('jenis_surat', ['jenis_surat' => $this->input->post('jenis_surat')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('arsip/jenissurat');
        }
    }
    public function editjenissurat()
    {
        $data['title'] = 'Jenis Surat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jenissurat'] = $this->db->get('jenis_surat')->result_array();

        $jenissurat = $this->input->post('jenis_surat');
        $id = $this->input->post('id');

        $this->form_validation->set_rules('jenis_surat', 'Jenis Surat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('jenis_surat', $jenissurat);
            $this->db->where('id', $id);
            $this->db->update('jenis_surat');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Surat diEdit!</div>');
            redirect('arsip/jenissurat');
        }
    }

    public function deletjenissurat()
    {
        $data['title'] = 'Jenis Surat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jenissurat'] = $this->db->get('jenis_surat')->result_array();

        $this->form_validation->set_rules('id', 'Id', 'required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('arsip/jenissurat', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $this->db->delete('jenis_surat', ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jenis Surat telah diHapus!</div>');
            redirect('arsip/jenissurat');
        }
    }

    public function editsurat()
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

            $no_surat = $this->input->post('no_surat');
            $tgl_surat = $this->input->post('tgl_surat');
            $perihal = $this->input->post('perihal');
            $id_jenis_surat = $this->input->post('id_jenis_surat');
            $pengirim = $this->input->post('pengirim');
            $ditujukan = $this->input->post('ditujukan');
            $deskripsi = $this->input->post('deskripsi');
            $id_petugas = 1;
            $sifat_surat = $this->input->post('sifat_surat');
            $jenis_surat = $this->input->post('jenis_surat');
            $balasid = $this->input->post('id');


            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/surat_masuk/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/surat_masuk/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('berkas_surat', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('no_surat', $no_surat);
            $this->db->set('tgl_surat', $tgl_surat);
            $this->db->set('perihal', $perihal);
            $this->db->set('id_jenis_surat', $id_jenis_surat);
            $this->db->set('pengirim', $pengirim);
            $this->db->set('ditujukan', $ditujukan);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->set('id_petugas', $id_petugas);
            $this->db->set('sifat_surat', $sifat_surat);
            $this->db->set('id_jenis_surat', $jenis_surat);

            $this->db->where('id', $balasid);
            $this->db->update('surat_masuk');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Masuk telah diEdit!</div>');
            redirect('arsip/suratmasuk');
        }
    }

    public function disposisi()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat'] = $this->db->get('surat_masuk')->result_array();

        $this->form_validation->set_rules('disposisi_kepada', 'Disposisi Kepada', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('arsip/suratmasuk', $data);
            $this->load->view('templates/footer');
        } else {

            $status_disposisi = $this->input->post('status_disposisi');
            $disposisi_kepada = $this->input->post('disposisi_kepada');
            $instruksi = $this->input->post('instruksi');
            $no_urut = $this->input->post('no_urut');
            $balasid = $this->input->post('id');

            $this->db->set('status_disposisi', $status_disposisi);
            $this->db->set('disposisi_kepada', $disposisi_kepada);
            $this->db->set('instruksi', $instruksi);
            $this->db->set('no_urut', $no_urut);

            $this->db->where('id', $balasid);
            $this->db->update('surat_masuk');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Masuk telah didisposisi!</div>');
            redirect('arsip/cetakdisposisi/' . $balasid);
        }
    }

    public function cetakdisposisi($id)
    {

        $data['title'] = 'Lembar Disposisi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['surat'] = $this->db->get_where('surat_masuk', ['id' => $id])->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('arsip/cetakdisposisi', $data);
        } else {
            $id = $this->input->post('id');

            redirect('arsip/cetakdisposisi');
        }
    }

    public function viewall($id)
    {

        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model');

        $data['getsurat'] = $this->Menu_model->getSuratmasuk($id);
        $data['surat'] = $this->db->get_where('surat_masuk', ['id' => $id])->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('arsip/viewall', $data);
        } else {
            $id = $this->input->post('id');

            redirect('arsip/vewall');
        }
    }

    public function suratkeluar()
    {
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['surat'] = $this->db->get('surat_keluar')->result_array();
        $data['jenissurat'] = $this->db->get('jenis_surat')->result_array();


        $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal Surat', 'required');


        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('arsip/suratkeluar', $data);
            $this->load->view('templates/footer');
        } else {

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/surat_keluar/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['surat_masuk']['berkas_surat'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/surat_keluar/' . $old_image);
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
                'id_jenis_surat' => $this->input->post('jenis_surat'),
                'id_petugas' =>  $this->input->post('userid'),
                'sifat_surat' => $this->input->post('sifat_surat'),
                'status_disposisi' => 0,
                'dibuat_pada' => time()
            ];

            $this->db->insert('surat_keluar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Keluar ditambahkan!</div>');
            redirect('arsip/suratkeluar');
        }
    }
}
