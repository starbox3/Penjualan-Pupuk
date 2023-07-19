<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    public function cart($user)
    {
        $query = "SELECT `tbl_keranjang`.*,`tbl_pupuk`.*
        FROM `tbl_keranjang` JOIN `tbl_pupuk`
        ON `tbl_keranjang`.`id_pupuk` = `tbl_pupuk`.`id`
        WHERE `tbl_keranjang`.`id_user`= $user";
        return $this->db->query($query)->result_array();
    }
    public function totalcart($user)
    {
        $query = "SELECT `tbl_keranjang`.*,`tbl_pupuk`.*
        FROM `tbl_keranjang` JOIN `tbl_pupuk`
        ON `tbl_keranjang`.`id_pupuk` = `tbl_pupuk`.`id`
        WHERE `tbl_keranjang`.`id_user`= $user";
        return $this->db->query($query)->num_rows();
    }
}
