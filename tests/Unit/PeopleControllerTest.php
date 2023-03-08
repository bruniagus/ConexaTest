<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PeopleControllerTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetAllPeople()
    {
        $response = $this->get('/api/starwars/peoples?limit=1&offset=10');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'results' => [
                '*' => [
                    'name',
                    'height',
                    'mass',
                    'hair_color',
                    'skin_color',
                    'eye_color',
                    'birth_year',
                    'gender',
                    'homeworld',
                    'films',
                    'species',
                    'vehicles',
                    'starships',
                    'created',
                    'edited',
                    'url',
                ],
            ],
        ]);
    }

    public function testGetPeopleByid()
    {
        $response = $this->get('/api/starwars/peoples/1');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'name',
            'height',
            'mass',
            'hair_color',
            'skin_color',
            'eye_color',
            'birth_year',
            'gender',
            'homeworld',
            'films',
            'species',
            'vehicles',
            'starships',
            'created',
            'edited',
            'url',
        ]);
    }
}
