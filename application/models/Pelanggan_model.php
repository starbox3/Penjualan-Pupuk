<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    public function cart($user)
    {
        $query = "SELECT `tbl_keranjang`.*,`tbl_pupuk`.*
        FROM `tbl_keranjang` 
        JOIN `tbl_pupuk`
        ON `tbl_keranjang`.`id_pupuk` = `tbl_pupuk`.`id`
        WHERE `tbl_keranjang`.`id_user`= '$user'
        AND `tbl_keranjang`.`status_keranjang`=1";
        return $this->db->query($query)->result_array();
    }
    public function riwayatpembelian($user)
    {
        $query = "SELECT `tbl_keranjang`.*,`tbl_pupuk`.*,`tbl_pembayaran`.*
        FROM `tbl_keranjang` 
        JOIN `tbl_pupuk`
        ON `tbl_keranjang`.`id_pupuk` = `tbl_pupuk`.`id`
        JOIN `tbl_pembayaran`
        ON `tbl_keranjang`.`id_pembayaran`=`tbl_pembayaran`.`id_pembayaran`
        WHERE `tbl_keranjang`.`id_user`= '$user'
        AND `tbl_keranjang`.`status_keranjang`=0
        ORDER BY `id_cart` DESC";
        return $this->db->query($query)->result_array();
    }
    public function totalbayar($user)
    {
        $query = "SELECT SUM(total_harga) 
        AS total_bayar 
        FROM `tbl_keranjang` 
        WHERE `tbl_keranjang`.`id_user`='$user'
        AND `tbl_keranjang`.`status_keranjang`=1";
        return $this->db->query($query)->row_array();
    }
    public function totalcart($user)
    {
        $query = "SELECT `tbl_keranjang`.*,`tbl_pupuk`.*
        FROM `tbl_keranjang` 
        JOIN `tbl_pupuk`
        ON `tbl_keranjang`.`id_pupuk` = `tbl_pupuk`.`id`
        WHERE `tbl_keranjang`.`id_user`= '$user'
        AND `tbl_keranjang`.`status_keranjang`=1";
        return $this->db->query($query)->num_rows();
    }
    public function sama($user, $detail)
    {
        $query = "SELECT `tbl_keranjang`.*,`tbl_pupuk`.*
        FROM `tbl_keranjang` 
        JOIN `tbl_pupuk`
        ON `tbl_keranjang`.`id_pupuk` = `tbl_pupuk`.`id`
        WHERE `tbl_keranjang`.`id_user`= '$user'
        AND `tbl_keranjang`.`status_keranjang`= 1
        AND `tbl_keranjang`.`id_pupuk`= $detail";
        return $this->db->query($query)->num_rows();
    }
}
