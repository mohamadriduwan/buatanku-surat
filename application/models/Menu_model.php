<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getPengguna()
    {
        $query = "SELECT `user`.*, `user_role`.`role`
                  FROM `user` JOIN `user_role`
                  ON `user`.`role_id` = `user_role`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getSuratMasuk($id)
    {
        $query = "SELECT `surat_masuk`.*, `jenis_surat`.`jenis_surat`
                  FROM `surat_masuk` JOIN `jenis_surat`
                  ON `surat_masuk`.`id_jenis_surat` = `jenis_surat`.`id`
                  WHERE `surat_masuk`.`id` = $id
                ";
        return $this->db->query($query)->result_array();
    }
}
