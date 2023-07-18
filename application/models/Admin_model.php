<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
        public function getSubMenu()
        {
                $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
                return $this->db->query($query)->result_array();
        }
        public function viewSuratMasukTipe($tipe)
        {
                $query = "SELECT `tbl_surat_masuk`.*,`tbl_data_penduduk`.`nama` FROM `tbl_surat_masuk` JOIN `tbl_data_penduduk` ON `tbl_surat_masuk`.`nik`=`tbl_data_penduduk`.`nik` AND `tbl_surat_masuk`.`tipe_surat`= $tipe ORDER BY `no_agenda` DESC";
                return $this->db->query($query)->result_array();
        }
        public function viewSuratMasuk()
        {
                $query = "SELECT `tbl_surat_masuk`.*,`tbl_data_penduduk`.`nama` FROM `tbl_surat_masuk` JOIN `tbl_data_penduduk` ON `tbl_surat_masuk`.`nik`=`tbl_data_penduduk`.`nik` ORDER BY `no_agenda` DESC";
                return $this->db->query($query)->result_array();
        }
        public function viewSuratKeluarTipe($tipe)
        {
                $query = "SELECT `tbl_surat_keluar`.*,`tbl_data_penduduk`.`nama` FROM `tbl_surat_keluar` JOIN `tbl_data_penduduk` ON `tbl_surat_keluar`.`nik`=`tbl_data_penduduk`.`nik` AND `tbl_surat_keluar`.`tipe_surat`= $tipe ORDER BY `no_agenda` DESC";
                return $this->db->query($query)->result_array();
        }
        public function viewSuratKeluar()
        {
                $query = "SELECT `tbl_surat_keluar`.*,`tbl_data_penduduk`.`nama` FROM `tbl_surat_keluar` JOIN `tbl_data_penduduk` ON `tbl_surat_keluar`.`nik`=`tbl_data_penduduk`.`nik` ORDER BY `no_agenda` DESC";
                return $this->db->query($query)->result_array();
        }

        public function dropCost()
        {
                $query = "DELETE FROM `tbl_customer`";
                return $this->db->query($query);
        }
        public function deleteRole($id)
        {
                $this->db->where('id', $id);
                $this->db->delete('user_role');
        }
        public function deleteSub($id)
        {
                $this->db->where('id', $id);
                $this->db->delete('user_sub_menu');
        }

        public function deleteMenu($id)
        {
                $this->db->where('id', $id);
                $this->db->delete('user_menu');
        }
        public function deleteSelectUser($checkid)
        {
                $this->db->where_in('id', $checkid);
                return $this->db->delete('users');
        }
        public function deleteSelectSuratMasuk($checkid)
        {
                $this->db->where_in('no_agenda', $checkid);
                return $this->db->delete('tbl_surat_masuk');
        }
        public function deleteSelectSuratKeluar($checkid)
        {
                $this->db->where_in('no_agenda', $checkid);
                return $this->db->delete('tbl_surat_keluar');
        }
        public function deleteSelectPenduduk($checkid)
        {
                $this->db->where_in('id_penduduk', $checkid);
                return $this->db->delete('tbl_data_penduduk');
        }
}
