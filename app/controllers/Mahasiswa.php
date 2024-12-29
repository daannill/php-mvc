<?php

class Mahasiswa extends Controller {

    private $halaman = 'mahasiswa';

    public function index() {
        
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('template/header', ['judul' => 'Mahasiswa']);
        $this->view('template/nav', $this->halaman);
        $this->view('mahasiswa/index', $data['mahasiswa']);
        $this->view('template/footer');
        
    }

    public function detail($id) {
        
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getMahasiswa($id);
        $this->view('template/header', ['judul' => 'Mahasiswa']);
        $this->view('template/nav', $this->halaman);
        $this->view('mahasiswa/detail', $data['mahasiswa']);
        $this->view('template/footer');
        
    }

    public function tambah() {
        
        var_dump($_POST);
        if( $this->model('Mahasiswa_model')->tambah($_POST) > 0 ) {
            Flasher::setMessage('Data Berhasil Ditambahkan', 'success');
        } else {
            Flasher::setMessage('Data Gagal Ditambahkan', 'danger');
        }

        header('Location: ' . BASEURL . '/mahasiswa/');
        exit;
        
    }

    public function hapus($id) {

        $this->model('Mahasiswa_model')->delete($id) > 0 ? Flasher::setMessage("Data Berhasil Dihapus", 'success'): Flasher::setMessage("Data Gagal Dihapus", 'danger');
        
        header("Location: " . BASEURL . '/mahasiswa/');
        exit;
        
    }

    public function getubah() {

        echo json_encode($this->model('Mahasiswa_model')->getMahasiswa($_POST['id']));
        
    }

    public function ubah() {
        
        $this->model('Mahasiswa_model')->update($_POST) > 0 ? Flasher::setMessage('Data Berhasil Diubah', 'success') : Flasher::setMessage('Data Gagal Diubah', 'danger');
        
        header('Location: ' . BASEURL . '/mahasiswa/');
        
    }
    
    public function search() {

        echo json_encode($this->model('Mahasiswa_model')->search($_POST['keyword']));
        
    }

    public function datamahasiswa() {

        $data = isset($_POST['data']) ? $_POST['data'] : [];
        $this->view('mahasiswa/table', $data);
        
    }

}