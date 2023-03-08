<?php

namespace App\Http\Controllers\StarWars;

use App\Http\Controllers\Controller;
use App\Http\Requests\StarWars\{PeopleIndexRequest,PeopleGetRequest};
use App\Services\StarWars\{GetPeoples,GetPeople};

class PeopleController extends Controller
{
    public function index(PeopleIndexRequest $request )
    {
        $getPeoples = new GetPeoples;
        $limit = $request->limit;
        $offset = $request->offset;
        $page = ($request->page)? $request->page:1;
        $route = $request->url();
        $peoples = $getPeoples($limit,$offset,$page,$route);
        if(!$peoples) return response()->json(['error' => 'dont found'],404);
        return response()->json($peoples,200);
    }

    public function show(PeopleGetRequest $request )
    {
        $getPeople = new GetPeople;
        $id = $request->id;
        $people = $getPeople($id);
        if(!$people) return response()->json(['error' => 'dont found'],404);
        return response()->json($people,200);
    }
}
