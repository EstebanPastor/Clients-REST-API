<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {

        $clients = Client::all();


        return response()->json($clients);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();

        $data = [
            "message" => "Client created successfully",
            "client" => $client
        ];

        return response()->json($data);

    }


    public function show(Client $client)
    
    {   $data= [
        "message" => "Client found successfully",
        "client" => $client,
        "services" => $client->services
    ];   
        return response() ->json($data);
    }


    public function edit(Client $client)
    {

    }


    public function update(Request $request, Client $client)
    {
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();

         $data = [
            "message" => "Client updated successfully",
            "client" => $client
         ];
         return response()->json($data);
    }


    public function destroy(Client $client)
    {
        $client->delete();

        $data = [
            "message" => "Client deleted successfully",
            "client" => $client
        ];

        return response()->json($data);
    }

    public function attach(Request $request,) {

        $client = Client::find($request->client_id);
        $client->services()->attach($request->service_id);
        
        $data = [
            "message" => "Service attached successfully",
            "client" => $client
        ];
        return response()->json($data);
    }
}
