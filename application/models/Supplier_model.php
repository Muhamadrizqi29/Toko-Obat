<?php 

class Supplier_model extends CI_model{

	public function getAllSupplier()
	{
		return $this->db->get('supplier')->result_array();
	}

	public function tambahDataSupplier()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"alamat" => $this->input->post('alamat', true),
			"kota" => $this->input->post('kota', true),
			"telp" => $this->input->post('telp', true)
		];

		$this->db->insert('supplier', $data);
	}

	public function hapusDataSupplier($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('supplier');
	}

	public function getSupplierById($id)
	{
		return $this->db->get_where('supplier', ['id' => $id])->row_array();
	}

	public function ubahDataSupplier()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"alamat" => $this->input->post('alamat', true),
			"kota" => $this->input->post('kota', true),
			"telp" => $this->input->post('telp', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('supplier', $data);
	}
}

