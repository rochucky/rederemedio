<?php

require_once 'unirest-php/Unirest.php';

class Geolocation {

    private $origin = ['lat' => '', 'long' => ''];
    private $destination = ['lat' => '', 'long' => ''];
    private $type = '';

    function __construct(){

    }

    function setOrigin($lat, $long){
      $this->origin = array(
        'lat' => $lat,
        'long' => $long
      );
    }

    function setDestination($lat, $long){
      $this->destination = array(
        'lat' => $lat,
        'long' => $long
      );
    }

    function setType($type) {
      $this->type = $type;
    }

    function getDistance(){
      $url = "https://router.hereapi.com/v8/routes?transportMode=".$this->type."&origin=".implode(',',$this->origin)."&destination=".implode(',',$this->destination)."&return=summary&apiKey=".API_KEY;
      $response = Unirest\Request::get($url);
      return $response->body->routes[0]->sections[0]->summary;
    }

}

?>