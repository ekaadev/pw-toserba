<?php 

class DetailReturPenjualan {

    public $id;
    public $nama;
    public $harga;
    public $jumlah;


    public function __construct($id, $nama, $harga, $jumlah) {
        $this->id = $id;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->jumlah = $jumlah;
    }
}

?>