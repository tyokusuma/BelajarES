<?php

class kelas {
  public function __construct(Walikelas $valueguru){
    $this->value = $valueguru;
  }
  public function getWalikelas(){
    return $this->value;
  }
}

class Walikelas {
  public function __construct($namaWali){
    $this->ibuguru = $namaWali;
  }

}
$guru = new Walikelas('Bu risma');
$kelas = new kelas($guru);

var_dump($kelas);
