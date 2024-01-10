<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reclamations;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listReclamation_client(){
        $client_id= Auth::user()->id;
        $list = Reclamations::where('client_id', $client_id)->get();

        return response()->json([
            "status"=>"1",
            "message"=>"La liste des réclamations",
            "data"=> $list
        ]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function createReclamation(Request $request)
    {
        //Le contrôle des champs
        $request->validate([
            "objet"=>"required",
            "description"=>"required",
        ]);

        $reclamation = new Reclamations();
        $reclamation->objet = $request->objet;
        $reclamation->description = $request->description;
        $reclamation->client_id= Auth::user()->id;

        $reclamation->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

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
