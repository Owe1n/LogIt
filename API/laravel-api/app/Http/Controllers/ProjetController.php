<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Identifiant;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Projet::All();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "nom_projet" => "required",
            ]
        );
        return Projet::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Projet::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projet = Projet::find($id);
        $projet->update($request->all());
        return $projet;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Projet::destroy($id);
    }

    /**
     * Attach a project
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attach(Request $request)
    {
        $request->validate([
            'id_identifiant' => 'required',
            'id_projet' => 'required',
        ]);
        $projet = Projet::find($request->input("id_projet"));
        $projet->identifiants()->toggle($request->input("id_identifiant"));
        return $projet->identifiants()->get();
    }


    /**
     * Retrieve Identifiants from the project
     *
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function attached_identifiants($id)
    {
        $projet = Projet::find($id);
        if ($projet) {
            return $projet->identifiants;
        } else {
            return "Unvalid ID";
        }
    }
}
