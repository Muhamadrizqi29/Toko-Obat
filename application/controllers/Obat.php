<?php 

Class Obat extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Obat_model');
	}
	
	public function index()
	{
		$data['judul'] = 'Data Obat';

		$data['obat'] = $this->Obat_model->getAllObat();
		$this->load->view('templates/header', $data);
		$this->load->view('obat/index');
		$this->load->view('templates/footer');
		
	}
	// public function tambah()
	// {
	// 	$data['judul'] = 'Form Tambah';

	// 	$this->form_validation->set_rules('kode_obat','Kode Obat','required');
	// 	$this->form_validation->set_rules('nama','Nama Obat','required');
	// 	$this->form_validation->set_rules('produsen','Produsen','required');
	// 	$this->form_validation->set_rules('harga','Harga','numeric');
	// 	$this->form_validation->set_rules('stok','Stok','numeric');
	// 	$this->form_validation->set_rules('foto','Foto','uploaded');

	// 		$this->load->model('Supplier_model');
 //            $supplier = $this->Supplier_model->get_all();
 //            foreach ($supplier->result() as $s) 
 //            {
 //                $option_supplier[$s->id] = $s->nama;
 //            }
 //            $data['supplier'] = $option_supplier;

	// 		$this->load->view('templates/header', $data);
	// 		$this->load->view('obat/tambah');
	// 		$this->load->view('templates/footer');
		
	// }

}