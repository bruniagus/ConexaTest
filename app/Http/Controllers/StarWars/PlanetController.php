<?php

namespace App\Http\Controllers\StarWars;

use App\Http\Controllers\Controller;
use App\Http\Requests\StarWars\{PlanetIndexRequest,PlanetGetRequest};
use App\Services\StarWars\{GetPlanets,GetPlanet};

class PlanetController extends Controller
{
    public function index(PlanetIndexRequest $request )
    {
        $getPeoples = new GetPlanets;
        $limit = $request->limit;
        $offset = $request->offset;
        $page = ($request->page)? $request->page:1;
        $route = $request->url();
        $peoples = $getPeoples($limit,$offset,$page,$route);
        if(!$peoples) return response()->json(['error' => 'dont found'],404);
        return response()->json($peoples,200);
    }

    public function show(PlanetGetRequest $request )
    {
        $getPeople = new GetPlanet;
        $id = $request->id;
        $people = $getPeople($id);
        if(!$people) return response()->json(['error' => 'dont found'],404);
        return response()->json($people,200);
    }
}
