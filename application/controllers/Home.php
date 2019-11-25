<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sesione_model');
    }

    public function index()
    {

        $data['_view'] = 'home/index';
        $this->load->view('layouts/main', $data);
    }

}