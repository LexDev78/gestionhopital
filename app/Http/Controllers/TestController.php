<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test= Test::all();
        $patients=Patient::all();
        $users = User::all();
        return view('test_crud.index', compact('test','patients','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $test=Test::all();
        // $patient=Patient::all();
        // $users=User::all();
        // return view("test_crud.index", compact('test', 'patient', 'users'));
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
            "user_id" => 'required',
            "patient_id" => 'required',
            "nom" => 'required',
            "prix" => 'required'

        ]);
        $test = Test::create([
            'user_id' => $request->user_id,
            'patient_id' => $request->patient_id,
            'nom' => $request->nom,
            'prix' => $request->prix
        ]);
        return redirect()->back();

    }


    /**
     * Display the specified resource.
     *
     *  @param  \App\Models\Test  $tests
     * @return \Illuminate\Http\Response
     */
    public function show(Test $tests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $tests
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $tests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Models\Test  $tests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validateData = $this->validate($request, [
            'user_id' => 'required',
            'patient_id' => 'required',
            'nom' => 'required',
            'prix' => 'required',
        ]);
        $test = Test::whereId($id)->update($validateData);

        return redirect()->back()->with('success','Modifier avec success!!!');
    }

    /**
     * Remove the specified resource from storage.
     *

     * @param  \App\Models\Test  $tests
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $test = Test::findOrfail($id);
        $test->delete();
        return redirect()->back()->with('success','Supprimer avec success');
    }
}
