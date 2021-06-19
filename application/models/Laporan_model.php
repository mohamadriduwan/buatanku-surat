<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function LaporanIzin($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * from surat_penelitian where tanggal_surat BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggal_surat ASC");
        return $query->result();
    }

    public function LaporanIzinSuket($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * from surat_penelitian where tanggal_surat BETWEEN '$tanggalawal' and '$tanggalakhir' AND is_active = 1 ORDER BY tanggal_surat ASC");
        return $query->result();
    }

    public function LaporanMasuk($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * from surat_masuk where tanggal_surat BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY dibuat_pada ASC");
        return $query->result();
    }

    public function LaporanKeluar($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * from surat_keluar where tanggal_surat BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY dibuat_pada ASC");
        return $query->result();
    }
    public function LaporanDisposisi($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT * from surat_masuk where tanggal_surat BETWEEN '$tanggalawal' and '$tanggalakhir' AND status_disposisi = 1 ORDER BY dibuat_pada ASC");
        return $query->result();
    }
}
