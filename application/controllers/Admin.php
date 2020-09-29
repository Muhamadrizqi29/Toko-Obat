<?php 

Class Admin extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}
	
	public function index()
	{
		$data['judul'] = 'Data Admin';

		$data['admin'] = $this->Admin_model->getAllAdmin();
		$this->load->view('templates/header', $data);
		$this->load->view('Admin/index');
		$this->load->view('templates/footer');
		
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data Admin';

		$this->form_validation->set_rules('nama','Nama Admin','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->Admin_model->tambahDataAdmin();
			$this->session->set_flashdata('info', 'ditambahkan');
			redirect('admin');
		}
	}

	public function hapus($id)
	{
		$this->Admin_model->hapusDataAdmin($id);
		$this->session->set_flashdata('info', 'dihapus');
		redirect('admin');
	}

	public function ubah($id)
	{
		$data['judul'] = 'Form Ubah Data Admin';
		$data['admin'] = $this->Admin_model->getAdminById($id);

		$this->form_validation->set_rules('nama','Nama Admin','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() == FALSE ) {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/ubah',$data);
			$this->load->view('templates/footer');
		} else {
			$this->Admin_model->ubahDataAdmin();
			$this->session->set_flashdata('info', 'diubah');
			redirect('admin');
		}
	}

}