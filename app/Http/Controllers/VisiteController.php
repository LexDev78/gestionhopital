<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visite;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class VisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $visites = Visite::latest()->get();
        $patients = Patient::latest()->get();
        $users = User::where('type_user_id', 1)->get();

        return view('visite_crud.index', compact('visites', 'patients', 'users'));
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
            'patient_matricule' => 'required',
            'user_id' => 'required',
            'date' => 'required',
            'heure' => 'required',

        ]);
        $patient = Patient::where('matricule',$request->patient_matricule)->first();
        $visite = Visite::create([
            'patient_id' =>  $patient->id,
            'user_id' => $request->user_id,
            'date' => $request->date,
            'heure' => $request->heure
        ]);

        return redirect()->back()->with('success','Visite creer avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visite  $visite
     * @return \Illuminate\Http\Response
     */
    public function show(Visite $visite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visite  $visite
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visite  $visite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $this->validate($request, [
            'patient_id' => 'required',
            'user_id' => 'required',
            'date' => 'required',
            'heure' => 'required',
        ]);
        $visite = Visite::whereId($id)->update($validateData);

        return redirect()->back()->with('success','Modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visite  $visite
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $visite = Visite::findOrfail($id);
        $visite->delete();
        return redirect()->back()->with('success','Supprimer avec success');
    }
}
