<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kode extends CI_Controller {

	
	public function index()
	{
		$this->load->model('Kode_model');
        $kode_barang = $this->Kode_model->CreateCode();
        echo $kode_barang;
      
	}
}
