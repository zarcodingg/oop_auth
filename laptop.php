<?php

// Parent class Elektronik
class Elektronik {
    protected $merk;
    private $jumlahLaptop;
    public $warnaLaptop;

    public function __construct($merk, $jumlahLaptop, $warnaLaptop) {
        $this->merk = $merk;
        $this->jumlahLaptop = $jumlahLaptop;
        $this->warnaLaptop = $warnaLaptop;
    }

    public function __destruct() {
        echo " Laptop yang sering digunakan.";
    }

    public function getMerk() {
        return $this->merk;
    }

    public function setJumlahLaptop($jumlah) {
        $this->setJumlahLaptop = $jumlah;
    }

    public function getJumlahLaptop() {
        return $this->jumlahLaptop;
    }
}

// Child class Laptop
class Laptop extends Elektronik {
    private $jenis;

    public function __construct($merk, $jumlahLaptop, $warnaLaptop, $jenis) {
        parent::__construct($merk, $jumlahLaptop, $warnaLaptop);
        $this->jenis = $jenis;
    }

    public function getJenis() {
        return $this->jenis;
    }

    public function setJenis($jenis) {
        $this->jenis = $jenis;
    }
}

// Instansiasi objek dari masing-masing class
$laptop = new Laptop("Lenovo. <br>", "1. <br>", "Black. <br>", "Ideapad. <br>");

// Set semua property dari objek
$laptop->setJumlahLaptop("1.");
$laptop->setJenis("Ideapad.");

// Get semua property dari objek
echo "Merk laptop : " . $laptop->getMerk() . " ";
echo "Jumlah laptop : " . $laptop->getJumlahLaptop() . " ";
echo "Warna laptop : " . $laptop->warnaLaptop . " ";
echo "Jenis laptop : " . $laptop->getJenis() . "<br> ";

// Panggil method dari objek
echo "Satu laptop yang sering digunakan untuk membuat sebuah projek, berwarna  " . $laptop->warnaLaptop . "";

?>