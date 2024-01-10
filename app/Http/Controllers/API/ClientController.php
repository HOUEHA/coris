<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Clients;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(Request $request){
        $request->validate([
            "nom_client"=>"required",
            "prenom_client"=>"required",
            "adresse"=>"required",
            "email"=>"required|email|unique:clients",
            "password"=>"required|confirmed",

        ]);

        //traitement
        $client = new Clients();
        $client->nom_client = $request->nom_client;
        $client->prenom_client = $request->prenom_client;
        $client->adresse = $request->adresse;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->phone = isset($request->phone)? $request->phone: "";

        $client->save();

        //response

        return response()->json([
            "status"=>1,
            "message"=>"Compte créé avec succès",
        ], 200);
    }

    public function login(Request $request){
        $request->validate([
            "email"=>"required|email",
            "password"=>"required",

        ]);

        //vérifier si le client existe
        $client = Clients::where('email', '=', $request->email)->first();

        if($client)
        {
                if(Hash::check($request->password, $client->password)){
                    //Création de token
                   $token= $client->createToken("auth_token")->plainTextToken;
                    return response()->json([
                        "status"=>1,
                        "message"=> "La connexion réussie",
                        "access_token"=>$token

                    ] );
                }else{
                    return response()->json([
                        "status"=>0,
                        "message"=> "Mot de passe incorrect",

                    ] );
                }
        }else{
            return response()->json([
                "status"=>0,
                "message"=> "Vous n'existez pas, créez un compte",

            ],404);
        }
    }
    //le profile
    public function profile(Request $request){
       return response()->json([
        "status"=>"1",
        "message"=>"Informations de profile",
        "datas"=>Auth::user()
       ]);
    }
//deconnection
    public function logout(Request $request){
        Auth::user()->tokens()->delete();
        return response()->json([
            "status"=>"1",
            "message"=>"Déconnexion effectuée",
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
