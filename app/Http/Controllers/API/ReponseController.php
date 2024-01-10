<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reponses;
use App\Models\Reclamations;

class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function createMessage(Request $request, $id)
    // {
    //     //
    //     $request->validate([
    //         ""=>"required",
    //     ]);

    //     $user= Auth::user()->id;
    //     $message = new Reponses();

    //     $message->message = $request->message;

    //     if( $message->reclamation_id= Reclamations::where($id, $user)->exists()){
    //         $message->reclamation_id= Reclamations::where($id, $user)->first()->id;
    //         $message->save();

    //         return response()->json([
    //             "status"=>"1",
    //             "message"=>"Réponse envoyée avec succès"
    //         ]);

    //     }else{

    //         return response()->json([
    //             "status"=>"0",
    //             "message"=>"L'identifiant n'existe pas"
    //         ], 404);
    //     }
    // }

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
    public function store(Request $request, $id)
    {
        //
        $request->validate([
            "message"=>"required",
        ]);

        $user= Auth::user()->id;
           // $message->save();
        //    ::create($request->message);
            $message = new Reponses();
            $message->message = $request->message;
            $message->reclamation_id= Reclamations::where("client_id", $user)->first()->id;

            $message->save();

            return response()->json([
                "status"=>"1",
                "message"=>"Message créé avec succès"
            ]);
    }


    //Liste de message par réclamation
    public function listeMessageReclamation(Request $request, $reclamation_id){
        $message= Reponses::where("reclamation_id", $reclamation_id)->get();

        return response()->json([
            "status"=>"1",
            "message"=>"Liste des messages liés à une réclamation",
            "datas"=>$message
        ]);
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
