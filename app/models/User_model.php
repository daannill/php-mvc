<?php

class User_model {
    private $user = [
        'nama' => 'Daniel Adi',
        'pekerjaan' => 'Programmer'
    ];

    public function getUser() {
        return $this->user;
    }
}