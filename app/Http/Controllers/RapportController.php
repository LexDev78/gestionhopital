<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rapport= Rapport::all();
        $patients=Patient::all();
        $users = User::all();
        return view('rapport_crud.index', compact('rapport','patients','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rapport=Rapport::all();
         $patient=Patient::all();
         $users=User::all();
         return view("rapport_crud.index", compact('rapport', 'patient', 'users'));
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
            "description" => 'required',
            "resultat" => 'required',
            "piece_jointe" => 'required',
            "patient_id" => 'required',
            "user_id" => 'required'
           
           


        ]);
        $rapport = Rapport::create([
            'description' => $request->description,
            'resultat' => $request->resultat,
            'piece_jointe' => $request->resultat,
            'patient_id' => $request->patient_id,
            'user_id' => $request->user_id,
            
           


        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function show(Rapport $rapport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function edit(Rapport $rapport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {

        $validateData =  $this->validate($request, [
            "description" => 'required',
            "resultat" => 'required',
            "piece_jointe" => 'required',
            "patient_id" => 'required',
            "user_id" => 'required'          
           
        ]);

        $rapport = Rapport::whereId($id)->update($validateData);

        return redirect()->back()->with('success','Modifier avec success!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rapport = Rapport::findOrfail($id);
        $rapport->delete();
        return redirect()->back()->with('success','Supprimer avec success');
    }
}
