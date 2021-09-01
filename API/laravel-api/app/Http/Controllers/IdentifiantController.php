<?php

namespace App\Http\Controllers;

use App\Models\Identifiant;
use App\Models\Projet;
use Illuminate\Http\Request;

class IdentifiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Identifiant::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_identifiant' => 'required',
            'mdp_identifiant' => 'required',
        ]);

        return Identifiant::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Identifiant::find($id);
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
        $identifiant = Identifiant::find($id);
        $identifiant->update($request->all());
        return $identifiant;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Identifiant::destroy($id);
    }

    /**
     * Search for a name
     *
     * @param  string $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Identifiant::where('nom_identifiant', 'like', '%' . $name . '%')->get();
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
        $identifiant = Identifiant::find($request->input("id_identifiant"));
        $identifiant->projets()->toggle($request->input("id_projet"));
        return $identifiant->projets()->get();
    }

    /**
     * Retrieve Project from the identifiant
     *
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function attached_project($id)
    {
        $identifiant = Identifiant::find($id);
        if ($identifiant) {
            return $identifiant->projects;
        } else {
            return "Unvalid ID";
        }
    }
}
