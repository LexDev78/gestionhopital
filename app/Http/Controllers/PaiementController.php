<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Paiement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paiements = Paiement::all();
        $patients = Patient::all();
        return view('paiement_crud.paiement_crud', compact('patients', 'paiements'));
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
        $this->validate($request, [
            'patient_id' => 'required',
            'motif' => 'required',
            'montant' => 'required|max:200',

        ]);
        $test= 1;
        $test2= date('Y-m-d');
        $paiement = Paiement::create([
            'user_id' => $test,
            'patient_id' => $request->patient_id,
            'motif' => $request->motif,
            'montant' => $request->montant,
            'date' => $test2,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $this->validate($request, [
            'patient_id' => 'required',
            'motif' => 'required',
            'montant' => 'required',
            'date' => 'required',
        ]);
        $paiement = Paiement::whereId($id)->update($validateData);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paiement = Paiement::findOrfail($id);
        $paiement->delete();
        return redirect()->back();
    }
}
