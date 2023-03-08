<?php

namespace App\Services\StarWars;
use GuzzleHttp\Client;

class GetPlanet {

    public function __invoke($id)
    {
        try {
            $client = new Client(['base_uri' => 'https://swapi.dev/api/']);
            $response = $client->request('GET', "planets/$id");
            return json_decode($response->getBody(),true);
        } catch (\Exception $e) {
            return false;
        }
    }
}