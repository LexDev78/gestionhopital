<?php

namespace App\Http\Controllers;

use App\Models\Traitement;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class TraitementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $traites = Traitement::latest()->get();
        $patients = Patient::latest()->get();
        $users = User::where('type_user_id', 1)->get();
        return view('traite_crud.index', compact('traites', 'patients', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'user_id' => 'required',
            'patient_id' => 'required',
            'libelle' => 'required|max:200',
            'prix' => 'required'
        ]);
        $traite = Traitement::create([
            'user_id' => $request->user_id,
            'patient_id' => $request->patient_id,
            'libelle' => $request->libelle,
            'prix' => $request->prix
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Traitement  $traitement
     * @return \Illuminate\Http\Response
     */
    public function show(Traitement $traitement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Traitement  $traitement
     * @return \Illuminate\Http\Response
     */
    public function edit(Traitement $traitement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traitement  $traitement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $this->validate($request, [
            'user_id' => 'required',
            'patient_id' => 'required',
            'libelle' => 'required|max:200',
            'prix' => 'required'
        ]);
        $traite = Traitement::whereId($id)->update($validateData);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traitement  $traitement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $traite = Traitement::findOrfail($id);
        $traite->delete();
        return redirect()->back();

    }
}
