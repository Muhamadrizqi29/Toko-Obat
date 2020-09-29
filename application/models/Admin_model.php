<?php 

class Admin_model extends CI_model{

	public function getAllAdmin()
	{
		return $this->db->get('admin')->result_array();
	}

	public function tambahDataAdmin()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"username" => $this->input->post('username', true),
			"password" => $this->input->post('password', true)
		];

		$this->db->insert('admin', $data);
	}

	public function hapusDataAdmin($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('admin');
	}

	public function getAdminById($id)
	{
		return $this->db->get_where('admin', ['id' => $id])->row_array();
	}

	public function ubahDataAdmin()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"username" => $this->input->post('username', true),
			"password" => $this->input->post('password', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('admin', $data);
	}
}

