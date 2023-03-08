<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class VehiclesControllerTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetAllPeople()
    {
        $response = $this->get('/api/starwars/vehicles?limit=1&offset=10');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'results' => [
                '*' => [
                    'name',
                    'model',
                    'manufacturer',
                    'cost_in_credits',
                    'length',
                    'max_atmosphering_speed',
                    'crew',
                    'passengers',
                    'cargo_capacity',
                    'consumables',
                    'vehicle_class',
                    'pilots',
                    'films',
                    'created',
                    'edited',
                    'url',
                ],
            ],
        ]);
    }

    public function testGetPeopleByid()
    {
        
        $response = $this->get('/api/starwars/vehicles/4');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'name',
            'model',
            'manufacturer',
            'cost_in_credits',
            'length',
            'max_atmosphering_speed',
            'crew',
            'passengers',
            'cargo_capacity',
            'consumables',
            'vehicle_class',
            'pilots',
            'films',
            'created',
            'edited',
            'url',
        ]);
    }
}
