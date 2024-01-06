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
        $this->load->view('admin/index');
    }
}