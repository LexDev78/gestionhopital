<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prescris = Prescription::latest()->get();
        $users = User::where('type_user_id', 1)->get();
        $patients = Patient::latest()->get();

        return view('prescri_crud.index', compact('prescris', 'users', 'patients'));
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
            'libelle' => 'required|max:200',
            'user_id' => 'required',
            'patient_id' => 'required'
        ]);
        $prescri = Prescription::create([
            'libelle' => $request->libelle,
            'user_id' => $request->user_id,
            'patient_id' => $request->patient_id
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $this->validate($request, [
            'libelle' => 'required|max:200',
            'user_id' => 'required',
            'patient_id' => 'required'
        ]);
        $prescri = Prescription::whereId($id)->update($validateData);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $prescri = Prescription::findOrfail($id);
        $prescri->delete();
        return redirect()->back();
    }
}
