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
                $query = "SELECT `tbl_pembayaran`.*,`users`.*,`tbl_bank`.`nama_bank` 
                FROM `tbl_pembayaran` 
                INNER JOIN `users` 
                ON `tbl_pembayaran`.`id_user`=`users`.`id_user` 
                INNER JOIN `tbl_bank` 
                ON `tbl_pembayaran`.`id_bank`=`tbl_bank`.`id_bank` 
                ORDER BY `tanggal_pembayaran` DESC";
                return $this->db->query($query)->result_array();
        }
        public function detailpembayaran($id)
        {
                $query = "SELECT `tbl_transaksi`.`id_pembayaran`,`tbl_keranjang`.*,`tbl_pupuk`.`gambar`,`harga`
                FROM `tbl_transaksi` 
                INNER JOIN `tbl_keranjang`
                ON `tbl_transaksi`.`id_cart`=`tbl_keranjang`.`id_cart`
                INNER JOIN `tbl_pupuk`
                ON `tbl_keranjang`.`id_pupuk`=`tbl_pupuk`.`id_pupuk`
                WHERE `tbl_transaksi`.`id_pembayaran`='$id'";
                return $this->db->query($query)->result_array();
        }
        public function metodePembayaran($id)
        {
                $query = "SELECT `tbl_pembayaran`.*,`tbl_bank`.`nama_bank`
                FROM `tbl_pembayaran` JOIN `tbl_bank`
                ON `tbl_pembayaran`.`id_bank`=`tbl_bank`.`id_bank`
                WHERE `id_pembayaran`='$id'";
                return $this->db->query($query)->row_array();
        }
        public function datapetani($id)
        {
                $query = "SELECT `tbl_data_petani`.*,`users`.*
                FROM `tbl_data_petani` JOIN `users`
                ON `tbl_data_petani`.`id_user` = `users`.`id_user`
                WHERE `tbl_data_petani`.`id_user` = '$id'";
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
                $this->db->where_in('id_pupuk', $checkid);
                return $this->db->delete('tbl_pupuk');
        }
        public function deleteSelectBank($checkid)
        {
                $this->db->where_in('id_bank', $checkid);
                return $this->db->delete('tbl_bank');
        }
        public function deleteSelectPetani($checkid)
        {
                $this->db->where_in('id_user', $checkid);
                $this->db->delete('tbl_data_petani');
                $this->db->where_in('id_user', $checkid);
                return $this->db->delete('users');
        }
}
