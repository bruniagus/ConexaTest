<?php

namespace App\Services\StarWars;
use GuzzleHttp\Client;

class GetVehicles {

    public function __invoke($limit,$offset,$page,$route)
    {
        try {
            $client = new Client(['base_uri' => 'https://swapi.dev/api/']);
            
            $response = $client->request('GET', 'vehicles', [
                'query' => [
                    'limit' => $limit,
                    'offset' => $offset,
                    'page' => $page,
                ]
            ]);
    
            $body = json_decode($response->getBody(),true);

            if ($body["next"] != null )  $body["next"] = $route ."?limit=$limit&page=". $page+1 ."&offset=$offset";
            if ($body["previous"] != null )  $body["previous"] = $route ."?limit=$limit&page=". $page-1 ."&offset=$offset";

            return $body;

        } catch (\Exception $e) {
            return false;
        }
    }
}