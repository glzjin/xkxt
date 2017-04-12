<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\StudentController;
use App\Models\Course;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class SelectedController extends StudentController
{
    //
    public function index()
    {
        return view('student/selected');
    }

    public function ajax()
    {
        $server_side_array = Datatables::collection(Log::where('student_user_id', '=', Auth::user()->id)->get())
                                        ->addColumn('op', '
                                        <div class="am-btn-group">
                                         <a class="am-btn am-btn-primary am-btn-xs" href="/student/courses/{{$course_id}}/delete" >退选</a>
                                        </div>')
                                        ->addColumn('course_name', function (Log $log) {
                                            return $log->course->course_name;
                                        })
                                        ->addColumn('course_description', function (Log $log) {
                                            return $log->course->course_description;
                                        })
                                        ->addColumn('course_owner', function (Log $log) {
                                            return $log->course->owner->real_name;
                                        })
                                        ->rawColumns(['op'])
                                        ->make(true);

        return $server_side_array;
    }
}
