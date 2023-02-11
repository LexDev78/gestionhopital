<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $operation= Operation::all();
        $patients=Patient::all();
        $users = User::all();
        return view('operation_crud.index', compact('operation','patients','users'));
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
            "user_id" => 'required',
            "patient_id" => 'required',
            "date" => 'required',
            "description" => 'required'

        ]);
        $operation = Operation::create([
            'user_id' => $request->user_id,
            'patient_id' => $request->patient_id,
            'date' => $request->date,
            'description' => $request->description
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $this->validate($request, [
            'user_id' => 'required',
            'patient_id' => 'required',
            'date' => 'required',
            'description' => 'required',
        ]);
        $operation = Operation ::whereId($id)->update($validateData);

        return redirect()->back()->with('success','Modifier avec success!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $operation = Operation::findOrfail($id);
        $operation->delete();
        return redirect()->back()->with('success','Supprimer avec success');
    }
}
