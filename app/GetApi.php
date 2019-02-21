<?php

namespace App;

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;

class GetApi
{
    public $client,
           $uri;

    public function __construct(){
        $this->client = new \GuzzleHttp\Client(['http_errors' => false]);
        $this->uri = "";
    }

    public function getWeatherById($idcountry){
        $this->uri = env("URL_API","")."forecast?id=".$idcountry."&mode=json&units=metric&cnt=5&appid=".env("APP_ID");
        $response = $this->client->get($this->uri);
        if ($response->getStatusCode() == 200){
            return json_decode($response->getBody());
        }            
    }

}
