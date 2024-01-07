<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . 'welcome?pesan=belumlogin');
        }
    }
    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/index');
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'welcome?pesan=logout');
    }
    public function ganti_password()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/ganti_password');
        $this->load->view('admin/footer');
    }
    function ganti_password_act()
    {
        $new_pass = $this->input->post('new_pass');
        $ulang_pass = $this->input->post('ulang_pass');
        $this->form_validation->set_rules('new_pass', 'Password Baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi Password Baru', 'required');
        if ($this->form_validation->run() != false) {
            $data = array(
                'password' => ($new_pass)
            );
            $w = array(
                'id_user' => $this->session->userdata('id_user')
            );
            $this->m_perpus->update_data($w, $data, 'user');
            redirect(base_url() . 'admin/ganti_password?pesan=berhasil');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/ganti_password');
            $this->load->view('admin/footer');
        }
    }
}
