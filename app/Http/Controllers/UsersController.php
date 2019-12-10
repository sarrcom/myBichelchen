<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Klass;
use App\Student;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users-list');
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
    public function overview()
    {
        $userlogged = session()->get('loggedUser');
        $user = $userlogged[0];
        if ($user->role === 'Teacher') {
            return view('users.teacher.overview',['user'=> $user]);
        }
        if ($user[0]->role === 'Guardian') {

            return view('users.guardian.overview',['user'=> $user]);
        }
        if ($user[0]->role === 'MaRe') {
            return view('users.mare.overview',['user'=> $user]);
        }
        
    }

    /**
     * Display the overview of the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function homework()
    {
        $userlogged = session()->get('loggedUser');
        $user = $userlogged[0];

        if ($user[0]->role=='Teacher') {
            return view('users.teacher.homework',['user'=> $user]);
        }
        if ($user[0]->role=='Guardian') {
            return view('users.guardian.homework',['user'=> $user]);
        }
        if ($user[0]->role=='MaRe') {
            return view('users.mare.homework',['user'=> $user]);
        }
    }

    /**
     * Display the overview of the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function messages()
    {

        $userlogged = session()->get('loggedUser');
        $user = $userlogged[0];

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

        if (count($user) != 0) {
            //with hashed password
            //$passwordValid = password_verify($request->loginFormPassword,$user[0]->password)

            if($request->loginFormPassword == $user[0]->password/*$passwordValid/*/){
                $user = session('loggedUser');
                return 'Login';
            }
        }

        return 'Wrong Username or Password';

    }
}
