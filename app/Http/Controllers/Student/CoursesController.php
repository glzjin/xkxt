<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\StudentController;
use App\Models\Course;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class CoursesController extends StudentController
{
    //
    public function index()
    {
        return view('student/courses');
    }

    public function ajax()
    {
        $server_side_array = Datatables::collection(Course::all())
                                        ->addColumn('op', function (Course $course) {
                                            if ($course->is_selected()) {
                                                return '
                                                <div class="am-btn-group">
                                                 <a class="am-btn am-btn-warning am-btn-xs" href="/student/courses/'.$course->id.'/delete" >退选</a>
                                                </div>';
                                            } else {
                                                return '
                                                <div class="am-btn-group">
                                                 <a class="am-btn am-btn-primary am-btn-xs" href="/student/courses/'.$course->id.'/add" >选课</a>
                                                </div>';
                                            }
                                        })
                                        ->addColumn('course_owner', function (Course $course) {
                                            return $course->owner->real_name;
                                        })
                                        ->addColumn('selected_number', function (Course $course) {
                                            return $course->selected_number();
                                        })
                                        ->rawColumns(['op'])
                                        ->make(true);

        return $server_side_array;
    }

    protected function add(Request $request, $id)
    {
        $course = Course::where('id', $id)->first();

        if ($course != null) {
            if (!$course->is_selected() && $course->limit_number > $course->selected_number()) {
                Log::create([
                  'student_user_id' => Auth::user()->id,
                  'course_id' => $id,
                  'timestamp' => date('Y-m-d H:i:s'),
              ]);
            }
        }


        return redirect('student/courses');
    }

    public function delete($id)
    {
        Log::where('course_id', $id)->where('student_user_id', Auth::user()->id)->delete();

        return redirect('student/courses');
    }
}
