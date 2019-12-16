<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Klass;
use App\Student;
use App\Notification;
use App\Comment;
use App\TeacherKlass;

class KlassesController extends Controller
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

        $klasses = Klass::all();
        return view('admin.klasses-list', [
            'admin' => $admin,
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
            'name' => 'required|min:2|max:20',
            'grade' => 'required|integer'
        ]);

        $klass = new Klass();

        $klass->name = trim($request->name);
        $klass->grade = trim($request->grade);

        $klass->save();
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
        $klass = Klass::find($id);
        return $klass;
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
            'name' => 'required|min:2|max:20',
            'grade' => 'required|integer'
        ]);

        $klass = Klass::find($id);

        $klass->name = trim($request->name);
        $klass->grade = trim($request->grade);

        $klass->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $klass = Klass::find($id);

        Student::where('klass_id', $klass->id)->update(['klass_id' => null]);

        while ($notification = Notification::where('klass_id', $klass->id)->first()) {
            Comment::where('notification_id', $notification->id)->delete();
            $notification->delete();
        }
        TeacherKlass::where('klass_id', $klass->id)->delete();

        Klass::destroy($id);
    }
}
