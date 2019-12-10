<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Student;
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
        $students = Student::all();
        return view('admin.users-list', ['users' => $users, 'students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klasses = Klass::all();
        return view('admin.add-user', ['klasses' => $klasses]);
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

        if ($request->role === "Teacher" || $request->role === "Guardian" || $request->role === "MaRe") {
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
        } elseif ($request->role === "Student") {
            $student = new Student;

            $student->first_name = trim($request->first_name);
            $student->last_name = trim($request->last_name);
            $student->date_of_birth = $request->date_of_birth;
            $student->klass_id = $request->klass;
            $student->timestamps = false;

            $student->save();
        }


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
        $user = User::find($id);
        return view('admin.edit-user', ['user' => $user]);
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
        $user = User::find($id);

        $user->first_name = trim($request->first_name);
        $user->last_name = trim($request->last_name);
        $user->date_of_birth = $request->date_of_birth;
        $user->role = $request->role;
        $user->timestamps = false;

        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/admin/users');
    }

    /**
     * Display the overview of the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function overview()
    {
        $loggedUser = session()->get('loggedUser');
        $user = $loggedUser[0];
        if ($user->role === 'Teacher') {

            return view('users.teacher.overview',['user'=> $user]);
        }
        if ($user->role === 'Guardian') {

            return view('users.guardian.overview',['user'=> $user]);
        }
        if ($user->role === 'MaRe') {

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
        $loggedUser = session()->get('loggedUser');
        $user = $loggedUser[0];

        if ($user->role=='Teacher') {
            return view('users.teacher.homework',['user'=> $user]);
        }
        if ($user->role=='Guardian') {
            return view('users.guardian.homework',['user'=> $user]);
        }
        if ($user->role=='MaRe') {
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

        $loggedUser = session()->get('loggedUser');
        $user = $loggedUser[0];

        if ($user->role=='Teacher') {
            return view('users.teacher.messages');
        }
        if ($user->role=='Guardian') {
            return view('users.guardian.messages',);
        }
        if ($user->role=='MaRe') {
            return view('users.mare.messages');
        }
    }

    public function login(Request $request)
    {

        $user = User::where('username', $request->loginFormUserName)->get();

        if (count($user) != 0) {
            //with hashed password
            //$passwordValid = password_verify($request->loginFormPassword,$user[0]->password);

            if($request->loginFormPassword == $user[0]->password/*$passwordValid/*/){
                session()->flush();
                $user = session('loggedUser');
                return 'Login';
            }
        }

        return 'Wrong Username or Password';

    }
}
