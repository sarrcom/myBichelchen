<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Klass;
use App\Notification;
use App\Comment;
use App\ResponsibleOfStudent;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $klasses = Klass::all();
        return view('admin.students-list', [
            'students' => $students,
            'klasses' => $klasses
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

        $student = new Student;

        $student->first_name = trim($request->first_name);
        $student->last_name = trim($request->last_name);
        $student->date_of_birth = $request->date_of_birth;
        $student->klass_id = $request->klass;

        $student->save();
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
        $student = Student::find($id);
        return $student;
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

        $student = Student::find($id);

        $student->first_name = trim($request->first_name);
        $student->last_name = trim($request->last_name);
        $student->date_of_birth = $request->date_of_birth;
        $student->klass_id = $request->klass;

        $student->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        while ($notification = Notification::where('student_id', $student->id)->first()) {
            Comment::where('notification_id', $notification->id)->delete();
            $notification->delete();
        }
        ResponsibleOfStudent::where('student_id', $student->id)->delete();

        Student::destroy($id);
    }
}
