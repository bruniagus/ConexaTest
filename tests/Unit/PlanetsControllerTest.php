<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PlanetsControllerTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetAllPeople()
    {
        $response = $this->get('/api/starwars/planets?limit=1&offset=10');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'results' => [
                '*' => [
                    'name',
                    'rotation_period',
                    'orbital_period',
                    'diameter',
                    'climate',
                    'gravity',
                    'terrain',
                    'surface_water',
                    'population',
                    'residents',
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
        $response = $this->get('/api/starwars/planets/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'name',
            'rotation_period',
            'orbital_period',
            'diameter',
            'climate',
            'gravity',
            'terrain',
            'surface_water',
            'population',
            'residents',
            'films',
            'created',
            'edited',
            'url',
        ]);
    }
}
