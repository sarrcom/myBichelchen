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
        $users = User::all();
        return view('admin.users-list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'first_name' => 'required|min:2|max:20',
            'last_name' => 'required|min:2|max:20'
        ]);

        $user = new User;

        $user->first_name = trim($request->first_name);
        $user->last_name = trim($request->last_name);
        $user->date_of_birth = $request->date_of_birth;

        // Generate the username
        do {
            $usernameId = rand(1, 9999);
            $username = $user->first_name . $usernameId;
            $duplicate = count(User::where('username', $username)->get());
        } while ($duplicate != 0);
        $user->username = $username;

        // Randomly generate the password
        $seed = str_split('abcdefghijklmnopqrstuvwxyz' . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . '0123456789');
        shuffle($seed);
        $pwRand = '';
        foreach (array_rand($seed, 8) as $k) $pwRand .= $seed[$k];

        // Saving the password in users.json
        $allUsers = [];
        $jsonFile = file_get_contents('users.json');
        $jsonDecoded = json_decode($jsonFile);
        if ($jsonDecoded == '') {
            $jsonDecoded = [];
        }
        foreach ($jsonDecoded as $value) {
            $allUsers[] = $value;
        }
        $allUsers[] = ['username' => $user->username, 'password' => $pwRand];
        file_put_contents('users.json', json_encode($allUsers, JSON_PRETTY_PRINT));
        $user->password = password_hash($pwRand, PASSWORD_DEFAULT);

        $user->role = $request->role;
        $user->timestamps = false;

        $user->save();

        return redirect('/admin/users');
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
        return view('admin.edit-user');
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
    public function overview($id)
    {
        return view('user-overview');
    }

    /**
     * Display the overview of the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function homework($id)
    {
        return view('user-homework');
    }

    /**
     * Display the overview of the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function messages($id)
    {
        return view('user-messages');
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->loginFormUserName)->get();
        if ($user) {
            //with hashed password
            $passwordValid = password_verify($request->loginFormPassword,$user[0]->password);

            if($passwordValid){
                session_start();
                $_SESSION['userlogged']= serialize($user);
                return redirect('/'.$user[0]->username.'/');
            }
        }

        return redirect('/');

    }
}
