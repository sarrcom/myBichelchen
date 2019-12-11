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
        $klasses = Klass::all();
        return view('admin.users.users-list', ['users' => $users, 'students' => $students, 'klasses' => $klasses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('admin.users.add-user', ['students' => $students]);
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

        $i = 0;
        $klassName = 'klass' . $i;
        $childName = 'child' . $i;
        if ($user->role == 'Teacher') {
            while (isset($request->$klassName)) {
                DB::insert('INSERT INTO jerd_teachers_klasses(klass_id, user_id) VALUES(?, ?)', [$request->$klassName, $user->id]);
                $i++;
                $klassName = 'klass' . $i;
            }
        } else if ($user->role == 'Guardian' || $user->role == 'MaRe') {
            while (isset($request->$childName)) {
                DB::insert('INSERT INTO jerd_responsible_of_students(student_id, user_id) VALUES(?, ?)', [$request->$childName, $user->id]);
                $i++;
                $childName = 'child' . $i;
            }
        }

        return redirect('/users');
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
        return view('admin.users.edit-user', ['user' => $user]);
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
        $user = session()->get('loggedUser');

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
        $user = session()->get('loggedUser');


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

        $user = session()->get('loggedUser');

        if ($user->role=='Teacher') {
            return view('users.teacher.messages',['user'=> $user]);
        }
        if ($user->role=='Guardian') {
            return view('users.guardian.messages',['user'=> $user]);
        }
        if ($user->role=='MaRe') {
            return view('users.mare.messages',['user'=> $user]);
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
                session(['loggedUser' => $user[0]]);
                return 'Login';
            }
        }

        return 'Wrong Username or Password';

    }
}
