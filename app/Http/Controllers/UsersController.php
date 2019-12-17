<?php

namespace App\Http\Controllers;

use DateTime;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\User;
use App\Student;
use App\Klass;
use App\Notification;
use App\Comment;
use App\ResponsibleOfStudent;
use App\TeacherKlass;
use Illuminate\Support\Facades\Cookie;

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
                $teacherKlass = new TeacherKlass;

                $teacherKlass->klass_id = $request->$klassName;
                $teacherKlass->user_id = $user->id;

                $teacherKlass->save();

                $i++;
                $klassName = 'klass' . $i;
            }
        } else if ($user->role == 'Guardian' || $user->role == 'MaRe') {
            while (isset($request->$childName)) {
                $responsibleOfStudent = new ResponsibleOfStudent;

                $responsibleOfStudent->student_id = $request->$childName;
                $responsibleOfStudent->user_id = $user->id;

                $responsibleOfStudent->save();

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
                $teacherKlass = new TeacherKlass;

                $teacherKlass->klass_id = $request->$klassName;
                $teacherKlass->user_id = $user->id;

                $teacherKlass->save();

                $i++;
                $klassName = 'klass' . $i;
            }
        } else if ($user->role == 'Guardian' || $user->role == 'MaRe') {
            ResponsibleOfStudent::where('user_id', $user->id)->delete();
            while (isset($request->$childName)) {
                $responsibleOfStudent = new ResponsibleOfStudent;

                $responsibleOfStudent->student_id = $request->$childName;
                $responsibleOfStudent->user_id = $user->id;

                $responsibleOfStudent->save();

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

        if(!$user){
            return redirect('/');
        }

        if (!Cookie::has('item')) {
            if ($user->role === 'Teacher') {
                $teacherKlass = TeacherKlass::where('user_id', $user->id)->first();
                Cookie::queue('item', $teacherKlass->klass_id, 10);
            } else if ($user->role === 'Guardian' || $user->role === 'MaRe') {
                $responsibleOfStudent = ResponsibleOfStudent::where('user_id', $user->id)->first();
                Cookie::queue('item', $responsibleOfStudent->student_id, 10);
            }
        }

        $item = Cookie::get('item');

        // MaRe Queries

        if ($user->role === 'Teacher') {
            $students = [];
            $rows = Student::where('klass_id', $item)->get();

            foreach ($rows as $row) {
                $students[] = $row->id;
            }
            // Teacher Queries
            $homeworks[] = Notification::where('user_id', $user->id)
                ->where('type', 'Homework')
                ->where('date', (new DateTime())->format('Y-m-d'))
                ->where('klass_id', $item)
                ->get();
            $homeworks[] = Notification::where('user_id', $user->id)
                ->where('type', 'Homework')
                ->where('date', (new DateTime())->format('Y-m-d'))
                ->whereIn('student_id', $students)
                ->get();

            $notes = Notification::where('type', 'Note')
                ->whereIn('student_id', $students)
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();

            $absences = Notification::where('type', 'Absence')
                ->whereIn('student_id', $students)
                ->where('date', (new DateTime())->format('Y-m-d'))
                ->get();

            return view('users.teacher.overview', ['user' => $user, 'klass' => $item, 'homeworkArray' => $homeworks, 'notes' => $notes, 'absences' => $absences]);
        } else if ($user->role === 'Guardian') {
            // Guardian Queries
            $student = Student::find($item);

            $homeworks[] = Notification::where('type', 'Homework')
                ->where('date', (new DateTime('tomorrow'))->format('Y-m-d'))
                ->where('klass_id', $student->klass_id)
                ->get();
            $homeworks[] = Notification::where('type', 'Homework')
                ->where('date', (new DateTime('tomorrow'))->format('Y-m-d'))
                ->where('student_id', $item)
                ->get();

            $notes[] = Notification::where('type', 'Note')
                ->where('student_id', $item)
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();
            $notes[] = Notification::where('type', 'Note')
                ->where('klass_id', $student->klass_id)
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();

            $absences = Notification::where('type', 'Absence')
                ->where('student_id', $item)
                ->orderBy('date', 'desc')
                ->limit(5)
                ->get();

            return view('users.guardian.overview', ['user' => $user, 'student' => $item, 'homeworkArray' => $homeworks, 'notesArray' => $notes, 'absences' => $absences]);
        } else if ($user->role === 'MaRe') {
            // MaRe Queries
            $student = Student::find($item);

            $homeworks[] = Notification::where('type', 'Homework')
                ->where('date', (new DateTime('tomorrow'))->format('Y-m-d'))
                ->where('klass_id', $student->klass_id)
                ->get();
            $homeworks[] = Notification::where('type', 'Homework')
                ->where('date', (new DateTime('tomorrow'))->format('Y-m-d'))
                ->where('student_id', $item)
                ->get();

            $notes[] = Notification::where('type', 'Note')
                ->where('student_id', $item)
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();
            $notes[] = Notification::where('type', 'Note')
                ->where('klass_id', $student->klass_id)
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();

            $absences = Notification::where('type', 'Absence')
                ->where('student_id', $item)
                ->orderBy('date', 'desc')
                ->limit(5)
                ->get();

            return view('users.mare.overview', ['user' => $user, 'student' => $item, 'homeworkArray' => $homeworks, 'notesArray' => $notes, 'absences' => $absences]);
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

            if($user->role=='Teacher'){
                $user = session()->get('loggedUser');

                $homeworkArray[] = Notification::where('user_id',$user->id)
                    ->where('date',$date)
                    ->where(function ($query) {
                    $user = session()->get('loggedUser');
                    $item = Cookie::get('item');
                    foreach ($user->klasses as $klass) {
                        if ($klass->id == $item) {
                            $query->orWhere('klass_id',$item);
                            foreach ($klass->students as $student) {
                                $query->orWhere('student_id', $student->id);
                                }
                            }
                        }
                    })
                    ->get();

                $allHomework =[];
                foreach ($homeworkArray as $homeworks) {
                    foreach ($homeworks as $homework) {
                        $allHomework[] = $homework;
                    }
                }

                return $allHomework;

            }else{
                $homeworkArray = Notification::where('date',$date)
                    ->where(function ($query) {
                        $item = Cookie::get('item');
                        $student = Student::find(1);
                        $query->where('klass_id',$student->klass_id)
                            ->orWhere('student_id', 1);

                    })
                    ->get();



                return $homeworkArray;
            }



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
        if ($request->has('sendTo')) {
            $message->klass_id = $request->recipient;
        }else if(!$request->has('sendTo')){
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


    /*for debugging the homework query we may need it later so dont delete this

    it shows the error page in stead of staying in the same page
    typo in the Model:(*/

    public function test(){

        /*lets assume we get the id of a class which is 1 for this example */



        $homeworks[] = DB::table('jerd_notifications')
                    ->where('type', 'Homework')
                    ->where('klass_id', 1)
                    ->get();

        $homeworks[] = DB::table('jerd_notifications')
                    ->where(function ($query) {
                        $user = session()->get('loggedUser');
                        foreach ($user->klasses as $klass) {
                            if ($klass->id == 1/* this value will be provide by the url */) {
                                foreach ($klass->students as $student) {
                                    $query->orWhere('student_id', $student->id);
                                    }
                                }
                            }
                            })
                        ->get();

        return $homeworks;
    }
}
