<?php


class Dashboard extends CI_Controller {

    public function index()
	{
        $this->load->model('Dashboard_model');
        $data['count'] = $this->Dashboard_model->get_all_count();
		$data['judul'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer');
	}
}
