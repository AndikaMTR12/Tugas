<?php

class Mahasiswa
{
    public $nama;
    public $nim;

    public function __construct($nama, $nim)
    {
        $this->nama = $nama;
        $this->nim = $nim;
    }

    public function menampilkan()
    {
        return "nama saya $this->nama, nim saya $this->nim";
    }
    
}

$andika = new Mahasiswa("Andika", "F1G118011");

echo $andika->menampilkan();
