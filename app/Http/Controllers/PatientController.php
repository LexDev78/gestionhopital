<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $patients = Patient::latest()->get();

        return view('patient_crud.index', compact('patients'));


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
            'nom' => 'required|max:200',
            'prenom' => 'required|max:200',
            'adresse' => 'required|max:200',
            'telephone' => 'required|max:200',
            'email' => 'required|max:200',

        ]);


        $patient = Patient::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
        ]);
        //Immatriculation
        $id = $patient->id;
        $matricule =   'P' . str_pad($id, 4, '0', STR_PAD_LEFT);
        $patient->matricule = $matricule;
        $patient->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $this->validate($request, [
            'matricule' => 'required|max:14',
            'nom' => 'required|max:200',
            'prenom' => 'required|max:200',
            'adresse' => 'required|max:200',
            'telephone' => 'required|max:200',
            'email' => 'required|max:200',
        ]);
        $patient = Patient::whereId($id)->update($validateData);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $patient = Patient::findOrfail($id);
        $patient->delete();
        return redirect()->back();
    }
}
