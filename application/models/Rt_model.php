<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rt_model extends CI_Model
{
    public function tblPenduduk($rt)
    {
        $query = "SELECT * FROM `tbl_data_penduduk` WHERE `id_user`= $rt ORDER BY `id_penduduk` DESC";
        return $this->db->query($query)->result_array();
    }
}
