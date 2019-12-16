<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Student;
use App\Klass;
use App\Notification;
use App\Comment;
use App\ResponsibleOfStudent;
use App\TeacherKlass;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = session()->get('loggedAdmin');
        if(!$admin){
            return redirect('/');
        }

        $users = User::all();
        $students = Student::all();
        $klasses = Klass::all();
        $responsibleStudents = ResponsibleOfStudent::all();
        $teachersKlasses = TeacherKlass::all();

        return view('admin.users-list', [
            'admin' => $admin,
            'users' => $users,
            'students' => $students,
            'klasses' => $klasses,
            'responsibleStudents' => $responsibleStudents,
            'teachersKlasses' => $teachersKlasses
        ]);
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

        $user->save();

        // Saving the records on the in between table
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
    public function edit($username)
    {
        $user = User::where('username', $username)->first();
        if ($user->role == 'Teacher') {
            $teacherKlasses = TeacherKlass::where('user_id', $user->id)->get();
            return [$user, $teacherKlasses];
        } else if ($user->role == 'Guardian' || $user->role == 'MaRe') {
            $responsibleOfStudents = ResponsibleOfStudent::where('user_id', $user->id)->get();
            return [$user, $responsibleOfStudents];
        }
        return "Error";
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
        $validation = $request->validate([
            'first_name' => 'required|min:2|max:20',
            'last_name' => 'required|min:2|max:20'
        ]);

        $user = User::find($id);

        $user->first_name = trim($request->first_name);
        $user->last_name = trim($request->last_name);
        $user->date_of_birth = $request->date_of_birth;
        $user->role = $request->role;

        $user->save();

        $i = 0;
        $klassName = 'klass' . $i;
        $childName = 'child' . $i;
        if ($user->role == 'Teacher') {
            TeacherKlass::where('user_id', $user->id)->delete();
            while (isset($request->$klassName)) {
                DB::insert('INSERT INTO jerd_teachers_klasses(klass_id, user_id) VALUES(?, ?)', [$request->$klassName, $user->id]);
                $i++;
                $klassName = 'klass' . $i;
            }
        } else if ($user->role == 'Guardian' || $user->role == 'MaRe') {
            ResponsibleOfStudent::where('user_id', $user->id)->delete();
            while (isset($request->$childName)) {
                DB::insert('INSERT INTO jerd_responsible_of_students(student_id, user_id) VALUES(?, ?)', [$request->$childName, $user->id]);
                $i++;
                $childName = 'child' . $i;
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        Comment::where('user_id', $user->id)->delete();
        Notification::where('user_id', $user->id)->delete();

        if ($user->role == 'Teacher') {
            TeacherKlass::where('user_id', $user->id)->delete();
        } else if ($user->role == 'Guardian' || $user->role == 'MaRe') {
            ResponsibleOfStudent::where('user_id', $user->id)->delete();
        }

        User::destroy($id);
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
    public function homework($date=null)
    {

        /*
        This contrroller sends the view if the argument is empty, if it provides a date it calls
        a function to return data
        */
        $user = session()->get('loggedUser');

        if($date == null){



            if ($user->role=='Teacher') {

                return view('users.teacher.homework',['user'=> $user]);
            }
            if ($user->role=='Guardian') {
                return view('users.guardian.homework',['user'=> $user]);
            }
            if ($user->role=='MaRe') {
                return view('users.mare.homework',['user'=> $user]);
            }
        }else{
            function getVariables(){
                $user = session()->get('loggedUser');

                    $klassesThisUser =[];
                    $studentsThisUser=[];

                    /*
                    for the teacher: get the klass and then all the ids of students in this klass
                    */
                    if($user->role=='Teacher'){

                        foreach ($user->klasses as $klass) {
                        $klassesThisUser[] = $klass->id;

                            foreach ($klass->students as $student) {
                                $studentsThisUser[]= $student->id;

                            }
                        }
                    }else{

                        /*
                        for MaRe and Guardian: get the id of the student and grab the th klass_id(foreign key)
                        */
                        foreach ($user->students as $student) {
                            $studentsThisUser[] = $student->id;
                            $klassesThisUser[]= $student->klass_id;
                            }
                    }

                return [ 'klassesThisUser' => $klassesThisUser , 'studentsThisUser' => $studentsThisUser ];
            }


                /*
                get a the homework related to students,  to klass of student(MaRe and Guardian) or
                klass related to User(teacher) and all students in said klass
                and all homewrok written by the user(teacher) itself
                and for the date
                if is used to add:
                    ->where('user_id', $user->id) to show submitted homework by this user
                    this user does not needs to know homework from other users

                ordered by Creation date, to show newest first.
                */


                if($user->role=='Teacher'){

                    $homework = DB::table('jerd_notifications')
                        ->where('type', 'Homework')
                        ->where('user_id', $user->id)
                        ->where('date', $date)
                        ->where(function ($query) {
                            $variables = getVariables();

                            // orWhere because the notifiaction has a student or klass id
                            $query->where('klass_id', $variables['klassesThisUser'])
                                ->orWhere('student_id', $variables['studentsThisUser']);
                        })
                        ->orderBy('created_at', 'desc')
                        ->get();
                }else{
                    $homework = DB::table('jerd_notifications')
                        ->where('type', 'Homework')
                        ->where('date', $date)
                        ->where(function ($query) {
                            $variables = getVariables();

                            // orWhere because the notifiaction has a student or klass id
                            $query->where('klass_id', $variables['klassesThisUser'])
                                ->orWhere('student_id', $variables['studentsThisUser']);
                        })
                        ->orderBy('created_at', 'desc')
                        ->get();
                }

                return $homework;


        }
    }

    /**
     * Display the overview of the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function messages($id = null)
    {
        $user = session()->get('loggedUser');

        if ($id == null) {

            if ($user->role=='Teacher') {
                return view('users.teacher.messages',['user'=> $user]);
            }
            if ($user->role=='Guardian') {
                return view('users.guardian.messages',['user'=> $user]);
            }
            if ($user->role=='MaRe') {
                return view('users.mare.messages',['user'=> $user]);
            }

            session()->flush();

            return redirect('/');
        } else {
            /*
            get a the messages related to students,  to klass of student(MaRe and Guardian) or
            klass related to User(teacher) and all students in said klass
            and all messages written by the user itself
            ordered by Creation date, to show newest first.
            */
            $messages = DB::table('jerd_notifications')
                ->where('type', 'Note')
                ->where(function ($query) {
                    $variables = getVariables();
                    $user = session()->get('loggedUser');
                    // orWhere because the notifiaction has a student or klass id
                    $query->where('klass_id', $variables['klassesThisUser'])
                        ->orWhere('student_id', $variables['studentsThisUser'])
                        ->orWhere('user_id', $user->id);
                })
                ->orderBy('created_at', 'desc')
                ->get();

            return $messages;
        }
    }

    /*
    function to get all the student and the klass_ids related to the user
    */
    function getVariables() {
        $user = session()->get('loggedUser');

        $klassesThisUser =[];
        $studentsThisUser=[];

        /*
        for the teacher: get the klass and then all the ids of students in this klass
        */
        if($user->role=='Teacher'){
            foreach ($user->klasses as $klass) {
            $klassesThisUser[] = $klass->id;

                        }
                    }
                }else{
                    /*
                    for MaRe and Guardian: get the id of the student and grab the th klass_id(foreign key)
                    */
                    foreach ($user->students as $student) {
                        $studentsThisUser[] = $student->id;
                        $klassesThisUser[]= $student->klass_id;
                        }
                }
            }
        }else{
            /*
            for MaRe and Guardian: get the id of the student and grab the th klass_id(foreign key)
            */
            foreach ($user->students as $student) {
                $studentsThisUser[] = $student->id;
                $klassesThisUser[]= $student->klass_id;
                }
        }

        return [ 'klassesThisUser' => $klassesThisUser , 'studentsThisUser' => $studentsThisUser ];
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

    public function submitHomework(Request $request){


        if (!is_numeric($request->recipient)) {
            return $request->recipient;
        }
        // get the current user to provide id
        $user = session()->get('loggedUser');

        //we check for subject and description, because the other fields are filled in by default
        $validation = $request->validate([
            'subject' => 'required|min:4|max:255',
            'description' => 'required|min:2|max:255',
            'dueDate' => 'after:today'

        ]);

        $homework = new Notification();

        $homework->description = trim($request->description);
        $homework->subject = trim($request->subject);
        $homework->type = 'Homework';

        if ($request->has('sendTo')) {
            $homework->klass_id = $request->recipient;  
        }else if(!$request->has('sendTo')){
            $homework->student_id = $request->recipient;
        }

        $homework->user_id = $user->id;
        $homework->date = $request->dueDate;


        $homework->save();

        return 'submitted';
    }


    public function sendMessages(Request $request){


        if (!is_numeric($request->recipient)) {
            return $request->recipient;
        }
        // get the current user to provide id
        $user = session()->get('loggedUser');

        //we check for subject and description, because the other fields are filled in by default
        $validation = $request->validate([
            'subject' => 'required|min:4|max:255',
            'description' => 'required|min:2|max:255',
            'dueDate' => 'after:today'

        ]);

        $message = new Notification();

        $message->description = trim($request->description);
        $message->subject = trim($request->subject);
        $message->type = 'Note';
        if ($user->role=='Teacher') {
            if ($request->has('sendTo')) {
                $message->klass_id = $request->recipient;  
            }else if(!$request->has('sendTo')){
                $message->student_id = $request->recipient;
            }
        }else{
            $message->student_id = $request->recipient;
        }
        $message->user_id = $user->id;
        $message->save();

        return 'submitted';
    }

    public function logout(){

                session()->flush();

                return redirect('/');
    }
    /*

    for debugging the homework query we may need it later so dont delete this

    it shows the error page in stead of staying in the same page
    typo in the Model:(

    public function test(){
        // get the current user to provide id

        //we check for subject and description, because the other fields are filled in by default
        /*$validation = $request->validate([
            'subject' => 'required|min:4|max:255',
            'description' => 'required|min:2|max:255'
            //'dueDate' => 'after:today'

        ]);

        $homework = new Notification();

        $homework->description = 'hello';
        $homework->subject = 'random';
        $homework->type = 'Note';
        $homework->klass_id = 1;


        $homework->user_id = 2;



        $homework->save();

        return $homework;
    }*/
}
