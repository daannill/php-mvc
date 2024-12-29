<?php

class About extends Controller{

    private $halaman = 'about';
    
    // public function __construct()
    // {
    //     echo "About";
    // }

    public function index($nama = '', $pekerjaan = '')
    {
        $data['user'] = $this->model('User_model')->getUser();
        $this->view('template/header', ['judul' => 'About']);
        $this->view('template/nav', $this->halaman);
        $this->view('about/index', $data['user']);
        $this->view('template/footer');
    }
    
}