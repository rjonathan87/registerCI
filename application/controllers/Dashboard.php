<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $data['_view'] = 'home/index';
        $this->load->view('layouts/main', $data);
    }
}