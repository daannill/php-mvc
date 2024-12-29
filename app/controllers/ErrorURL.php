<?php

class ErrorURL extends Controller{

    public function notfound() {

        $data['judul'] = '404 NOT FOUND';
        $this->view('template/header', $data);
        $this->view('error/notfound');
        $this->view('template/footer');

    }

}