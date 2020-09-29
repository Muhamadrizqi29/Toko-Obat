<?php 

Class Supplier extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Supplier_model');
	}

	public function index()
	{
		$data['judul'] = 'Data Supplier';

		$data['supplier'] = $this->Supplier_model->getAllSupplier();

		$this->load->view('templates/header', $data);
		$this->load->view('supplier/index');
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data Supplier';

		$this->form_validation->set_rules('nama','Nama Supplier','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('kota','Kota','required');
		$this->form_validation->set_rules('telp','No Telepon','required');

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/header', $data);
			$this->load->view('supplier/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->Supplier_model->tambahDataSupplier();
			$this->session->set_flashdata('info', 'ditambahkan');
			redirect('supplier');
		}
	}

	public function hapus($id)
	{
		$this->Supplier_model->hapusDataSupplier($id);
		$this->session->set_flashdata('info', 'dihapus');
		redirect('supplier');
	}

	public function ubah($id)
	{
		$data['judul'] = 'Form Ubah Data Supplier';
		$data['supplier'] = $this->Supplier_model->getSupplierById($id);

		$this->form_validation->set_rules('nama','Nama Supplier','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('kota','Kota','required');
		$this->form_validation->set_rules('telp','No Telepon','required');

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/header', $data);
			$this->load->view('supplier/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Supplier_model->ubahDataSupplier();
			$this->session->set_flashdata('info', 'diubah');
			redirect('supplier');
		}
	}

}

