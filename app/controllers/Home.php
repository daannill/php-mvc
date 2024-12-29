<?php

class Home extends Controller{

    private $halaman = 'home';

    public function index() {

        $data = $this->model('User_model')->getUser();
        $this->view('template/header', ['judul' => 'Home']);
        $this->view('template/nav', $this->halaman);
        $this->view('home/index', $data);
        $this->view('template/footer');

    }

}