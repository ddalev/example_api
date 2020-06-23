<?php

namespace App\Http\Controllers;

use App\ExampleMembers;
use App\Http\Resources\ExampleMemberResource;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $perPage = 10;

        if ($request->input('country', null) !== null) {
            $players = ExampleMembers::where('country', '=', $request->country)
                ->paginate($perPage)
                ->appends(['country' => $request->country]);
        } else {
            $players = ExampleMembers::paginate($perPage);
        }

        return ExampleMemberResource::collection($players);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return ExampleMemberResource
     */
    public function store(Request $request)
    {
        $headerAccept = $request->header('Accept');
        $headerContentType = $request->header('Content-Type');

        if ($headerAccept != 'application/json' || $headerContentType != 'application/json') {
            return new ExampleMemberResource(
                [
                    "message" => "The given data was invalid.",
                    "errors" => [
                        'header' => 'header "Accept" and "Content-Type" should be application/json',
                    ],
                ]
            );
        }

        $request->validate([
            'name' => 'required|max:255',
            'country' => 'required|max:255',
            'birth_date' => 'nullable|date_format:Y-m-d',
        ]);



        //
        $name = $request->input('name');
        $country = $request->input('country');
        $birth_date = $request->input('birth_date');

        $player = new ExampleMembers();

        $player->name = $name;
        $player->country = $country;
        $player->birth_date = $birth_date;

        if ($player->save()) {
            return new ExampleMemberResource($player);
        }
    }
}
