<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\TeacherController;
use App\User;

class StudentsController extends TeacherController
{
    //
    public function index()
    {
        return view('teacher/student');
    }

    public function ajax()
    {
        return Datatables::collection(User::where('role', '=', 2)->get())->make(true);
    }
}
