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
        $patient=Patient::all();
        $users = User::all();
        return view('test_crud.index', compact('test','patient','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $test=Test::all();
        $patient=Patient::all();
        $users=User::all();
        return view("test_crud.index", compact('test', 'patient', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test =Test::create([
            "user_id" => $request->user_id,
            "patient_id" => $request->patient_id,
            "nom" => $request->nom,  
            "prix" =>  $request->prix
            
        ]);
        if($test){
            $test=Test::all();
            $patient=Patient::all();
            $users= User::all();
            return view('test_crud.index', compact('test','patient','users'));
            return redirect('/test');
        }

        return redirect()->back();
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        return view("test_crud.show", compact("test"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        return view('test_crud.edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $test)
    {
        $test = Test::find($test);
        $validatedData = $request->validate([
        'user_id' => 'required',
        'patient_id' => 'required',
        'nom'=>'required',
        'prix'=>'required'
    ]);

        $tests = $test->update([
                    "user_id" => $request -> user_id,
                    "patient_id"  => $request -> patient_id,
                    "nom" => $request->nom,
                    "prix" => $request->prix
                ]);
        if($tests){
         return redirect('/test')->with('Avec success !!!');

        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test = Test::findOrFail($test->id);
        $test->delete();
    
        return redirect('/test')->with('Avec success !!!');
    }
}
