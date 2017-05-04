<?php
class telolet {


  public function __construct($he, Bus $b, Angkot $a){

    $this->bus= $b;
    $this->angkot=$a;

  }
  public function getBus(){
     return $this->bus;
  }
  public function getAngkot(){
    return $this->angkot;
  }
}
// object
class Bus{
  public function __construct($name){
    $this->name = $name;
  }
  public function getName(){
    return $this->name;
  }
  public function setName($x){
    $this->name=$x;
  }
}

class Angkot {
  public function __construct($tranportasi){
    $this->fungsi=$tranportasi;
  }
  public function getFungsi(){
    return $this->fungsi;
  }
  public function setFungsi($value){
    $this->fungsi= $value;
  }
}

class telole extends Bus {
}
$anak = new telole('saya anak nya BUs');
$bus = new Bus('Pahala Kencana');
$angkotdago = new Angkot('kepala-dag0');
// $bus->setName("hello");
$telolet = new telolet('hello', $bus,$angkotdago);

// var_dump($telolet, $bus);
var_dump($telolet->getBus(),$telolet->getBus()->getName());
// var_dump($telolet->getAngkot()->getFungsi());
var_dump($anak);
