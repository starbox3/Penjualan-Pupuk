<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    public function cart($user)
    {
        $query = "SELECT `tbl_keranjang`.*,`tbl_pupuk`.*
        FROM `tbl_keranjang` 
        JOIN `tbl_pupuk`
        ON `tbl_keranjang`.`id_pupuk` = `tbl_pupuk`.`id_pupuk`
        WHERE `tbl_keranjang`.`id_user`= '$user'
        AND `tbl_keranjang`.`status_keranjang`=1";
        return $this->db->query($query)->result_array();
    }
    public function riwayatpembelian($user)
    {
        $query = "SELECT `tbl_transaksi`.*,`tbl_pembayaran`.*,`tbl_keranjang`.`id_pupuk`,`jumlah`,`total_harga`,`tbl_pupuk`.`harga`,`nama`,`gambar`
        FROM `tbl_transaksi` 
        INNER JOIN `tbl_pembayaran`
        ON `tbl_transaksi`.`id_pembayaran`=`tbl_pembayaran`.`id_pembayaran`
        INNER JOIN `tbl_keranjang`
        ON `tbl_transaksi`.`id_cart`=`tbl_keranjang`.`id_cart`
        INNER JOIN `tbl_pupuk`
        ON `tbl_keranjang`.`id_pupuk`=`tbl_pupuk`.`id_pupuk`
        WHERE `tbl_transaksi`.`id_user`='$user'
        ORDER BY `id_transaksi` ASC";
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
        ON `tbl_keranjang`.`id_pupuk` = `tbl_pupuk`.`id_pupuk`
        WHERE `tbl_keranjang`.`id_user`= '$user'
        AND `tbl_keranjang`.`status_keranjang`=1";
        return $this->db->query($query)->num_rows();
    }
    public function sama($user, $detail)
    {
        $query = "SELECT `tbl_keranjang`.*,`tbl_pupuk`.*
        FROM `tbl_keranjang` 
        JOIN `tbl_pupuk`
        ON `tbl_keranjang`.`id_pupuk` = `tbl_pupuk`.`id_pupuk`
        WHERE `tbl_keranjang`.`id_user`= '$user'
        AND `tbl_keranjang`.`status_keranjang`= 1
        AND `tbl_keranjang`.`id_pupuk`= $detail";
        return $this->db->query($query)->num_rows();
    }
    public function datapetani($user)
    {
        $query = "SELECT `tbl_data_petani`.*,`users`.*
        FROM `tbl_data_petani` JOIN `users`
        ON `tbl_data_petani`.`id_user` = `users`.`id_user`
        WHERE `tbl_data_petani`.`id_user` = '$user'";
        return $this->db->query($query)->row_array();
    }
}
