<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_perpus');
	}
	public function index()
	{
		$this->load->view('login');
	}

	function login()
	{
		// 	$username = $this->input->post('username');
		// 	$password = $this->input->post('password');
		// 	$this->form_validation->set_rules('username', 'Username', 'trim|required');
		// 	$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() != false) {
			$where = array(
				'username' => $username,
				'password' => $password
			);
			$data = $this->M_perpus->edit_data($where, 'user');
			$d = $this->M_perpus->edit_data($where, 'user')->row();
			
			$cek = $data->num_rows();
			if ($cek > 0) {
				$session = array(
					'id_user' => $d->id_user,
					'username' => $d->username,
					'status' => 'login'
				);
				$this->session->set_userdata($session);
				redirect(base_url() . 'admin');
			} else {
				redirect(base_url() . 'welcome?pesan=gagal');
			}
		} else {
			$this->load->view('login');
		}
	}
}
