<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $salles = Salle::latest()->get();
        $patients = Patient::latest()->get();
        return view('salle_crud.index', compact('salles', 'patients'));
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
        $this->validate($request,[
            'nom' => 'required|max:200',
            'patient_id' => 'required',
            'numero' => 'required'

        ]);
        $salle = Salle::create([
            'nom' => $request->nom,
            'patient_id' => $request->patient_id,
            'numero' => $request->numero
        ]);

        return redirect()->back()->with('Success', 'Salle ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function show(Salle $salle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function edit(Salle $salle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $this->validate($request, [
            'nom' => 'required|max:200',
            'patient_id' => 'required',
            'numero' => 'required'
        ]);

        $salle = Salle::whereId($id)->update($validateData);
        return redirect()->back()->with('Success', 'Salle modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $salle = Salle::findOrfail($id);
        $salle->delete();
        return redirect()->back()->with('Success', 'Salle supprimer avec success');

    }
}
