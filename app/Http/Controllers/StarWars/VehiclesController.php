<?php

namespace App\Http\Controllers\StarWars;

use App\Http\Controllers\Controller;
use App\Http\Requests\StarWars\{VehiclesIndexRequest,VehiclesGetRequest};
use App\Services\StarWars\{GetVehicles,GetVehicle};

class VehiclesController extends Controller
{
    public function index(VehiclesIndexRequest $request )
    {
        $getPeoples = new GetVehicles;
        $limit = $request->limit;
        $offset = $request->offset;
        $page = ($request->page)? $request->page:1;
        $route = $request->url();
        $peoples = $getPeoples($limit,$offset,$page,$route);
        if(!$peoples) return response()->json(['error' => 'dont found'],404);
        return response()->json($peoples,200);
    }

    public function show(VehiclesGetRequest $request )
    {
        $getPeople = new GetVehicle;
        $id = $request->id;
        $people = $getPeople($id);
        if(!$people) return response()->json(['error' => 'dont found'],404);
        return response()->json($people,200);
    }
}
