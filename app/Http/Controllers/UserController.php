<?php

namespace App\Http\Controllers;

use App\Models\Type_user;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types = Type_user::all();
        $users = User::all();
        return view("pages.users.index",compact("users",'types'));
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
        $data = $request->validate([
                    'type_user_id' => ['required', 'integer', 'max:255'],
                    'status' => ['required', 'integer', 'max:255'],
                    'nom' => ['required', 'string', 'max:255'],
                    'prenom' => ['required', 'string', 'max:255'],
                    'telephone' => ['required', 'string','min:8', 'max:14'],
                    'username' => ['required', 'string', 'max:255', 'unique:users'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8'],
                ]);
        DB::beginTransaction();
        try{
            $password = Hash::make($request->password);
            $user = User::create($data);
            $user->password = $password;
            $user->save();
            DB::commit();

        }catch(\Exception $e)
        {
            DB::rollBack();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Redirect()->action([UserController::class,'index']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        
        DB::beginTransaction();
       $data = $request->validate(
            [
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string', 'max:255'],
                'adresse' => ['required', 'string', 'max:255'],
                'telephone' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
            ]
            );
        try{
            $user = User::find(Auth::user()->id);
            if($request->file('file'))
            {
                $image = $request->file('file');
                $accepted_files = ["jpg","png","gif"];
                $ext = $image->getClientOriginalExtension();
                $ext = strtolower($ext);
                if(in_array($ext,$accepted_files))
                {
                    $image_name = time().'.'.$ext;
                    $image->move(public_path("images/"),$image_name);

                    $user->update($data);
                    $user->update(['profile'=>$image_name]);
                    DB::commit();
                    return back();
        
                }else{
                    DB::rollBack();
                    return back();
                }  
            }else
            {
                $user->update($data);
                return back();                
            }
            DB::commit();
            return back();
        }catch(\Exception $e)
        {
            DB::rollback();
            return back();
        }

     }

    /**
     * Profile Utilisateur
     */
    public function profile()
    {
        return view("pages.users.profile");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
