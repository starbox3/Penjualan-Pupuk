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
        public function pembayaran()
        {
                $query = "SELECT `tbl_pembayaran`.*,`users`.* 
                FROM `tbl_pembayaran` 
                JOIN `users` 
                ON `tbl_pembayaran`.`id_user`=`users`.`id`
                ORDER BY `tanggal_pembayaran` DESC";
                return $this->db->query($query)->result_array();
        }
        public function detailpembayaran($id)
        {
                $query = "SELECT `tbl_keranjang`.*,`users`.*,`tbl_pembayaran`.*,`tbl_pupuk`.*
                FROM `tbl_keranjang` 
                JOIN `users`
                ON `tbl_keranjang`.`id_user`=`users`.`id`
                JOIN `tbl_pembayaran`
                ON `tbl_keranjang`.`id_pembayaran`=`tbl_pembayaran`.`id_pembayaran`
                JOIN `tbl_pupuk`
                ON `tbl_keranjang`.`id_pupuk`=`tbl_pupuk`.`id`
                WHERE `tbl_pembayaran`.`id_pembayaran`='$id'";
                return $this->db->query($query)->result_array();
        }
        public function datapetani($id)
        {
                $query = "SELECT `tbl_data_petani`.*,`users`.*
                FROM `tbl_data_petani` JOIN `users`
                ON `tbl_data_petani`.`id_data_petani` = `users`.`id`
                WHERE `tbl_data_petani`.`id_data_petani` = '$id'";
                return $this->db->query($query)->row_array();
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
        public function deleteSelectPupuk($checkid)
        {
                $this->db->where_in('id', $checkid);
                return $this->db->delete('tbl_pupuk');
        }
        public function deleteSelectBank($checkid)
        {
                $this->db->where_in('id_bank', $checkid);
                return $this->db->delete('tbl_bank');
        }
        public function deleteSelectPetani($checkid)
        {
                $this->db->where_in('id', $checkid);
                $this->db->delete('users');
                $this->db->where_in('id_data_petani', $checkid);
                return $this->db->delete('tbl_data_petani');
        }
}
