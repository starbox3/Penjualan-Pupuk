<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekdes_model extends CI_Model
{
    public function viewSuratMasuk($surat)
    {
        $query = "SELECT `tbl_surat_masuk`.*,`tbl_data_penduduk`.`nama` FROM `tbl_surat_masuk` JOIN `tbl_data_penduduk` ON `tbl_surat_masuk`.`nik`=`tbl_data_penduduk`.`nik` AND `tbl_surat_masuk`.`no_agenda`= $surat";
        return $this->db->query($query)->row_array();
    }
    public function viewSuratKeluar($surat)
    {
        $query = "SELECT `tbl_surat_keluar`.*,`tbl_data_penduduk`.`nama` FROM `tbl_surat_keluar` JOIN `tbl_data_penduduk` ON `tbl_surat_keluar`.`nik`=`tbl_data_penduduk`.`nik` AND `tbl_surat_keluar`.`no_agenda`= $surat";
        return $this->db->query($query)->row_array();
    }
}
