<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kode_model extends CI_Model
{
    public function CreateCode()
    {
        $this->db->select('RIGHT(users.nip,5) as nip', FALSE);
        $this->db->order_by('nip', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('users');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->nip) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
        $kodetampil = "20" . $batas;
        return $kodetampil;
    }
}
