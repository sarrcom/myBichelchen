<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Klass;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-user');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit-user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    /**
     * Display the overview of the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function overview($username)
    {
        $user = User::where('username', $username)->get();
        if ($user[0]->role=='Teacher') {
            return view('users.teacher.overview');
        }
        if ($user[0]->role=='Guardian') {
            return view('users.guardian.overview',);
        }
        if ($user[0]->role=='MaRe') {
            return view('users.mare.overview');
        }
        
    }

    /**
     * Display the overview of the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function homework($username)
    {
        $user = User::where('username', $username)->get();
        if ($user[0]->role=='Teacher') {
            return view('users.teacher.homework');
        }
        if ($user[0]->role=='Guardian') {
            return view('users.guardian.homework',);
        }
        if ($user[0]->role=='MaRe') {
            return view('users.mare.homework');
        }
    }

    /**
     * Display the overview of the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function messages($username)
    {
        $user = User::where('username', $username)->get();
        if ($user[0]->role=='Teacher') {
            return view('users.teacher.messages');
        }
        if ($user[0]->role=='Guardian') {
            return view('users.guardian.messages',);
        }
        if ($user[0]->role=='MaRe') {
            return view('users.mare.messages');
        }
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->loginFormUserName)->get();
        if ($user) {
            //with hashed password
            //$passwordValid = password_verify($request->loginFormPassword,$user[0]->password)
            
            if($request->loginFormPassword == $user[0]->password/*$passwordValid/*/){
                session_start();
                $_SESSION['userlogged']= serialize($user);
                return redirect('/'.$user[0]->username.'/');
            }
        }

        return redirect('/');
       
    }
}
