<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\TeacherController;
use App\Models\Course;
use App\Models\Log;
use App\User;
use Illuminate\Support\Facades\Auth;

class CoursesController extends TeacherController
{
    //
    public function index()
    {
        return view('teacher/course');
    }

    public function ajax()
    {
        $server_side_array = Datatables::collection(Course::where('course_owner_user_id', '=', Auth::user()->id)->get())
                                        ->removeColumn('course_owner_user_id')
                                        ->addColumn('op', '
                                        <div class="am-btn-group">
                                         <a class="am-btn am-btn-primary am-btn-xs" href="/teacher/courses/{{$id}}/edit" >编辑</a>
                                         <a class="am-btn am-btn-primary am-btn-xs" href="/teacher/courses/{{$id}}/delete" >删除</a>
                                         <a class="am-btn am-btn-primary am-btn-xs" href="/teacher/courses/{{$id}}/selected" >查看已选学生</a>
                                        </div>')
                                        ->rawColumns(['op'])
                                        ->addColumn('selected_number', function (Course $course) {
                                            return $course->selected_number();
                                        })
                                        ->make(true);

        return $server_side_array;
    }

    public function add_view()
    {
        return view('teacher/course_add');
    }

    protected function add(Request $request)
    {
        $data = $request->all();
        Course::create([
            'course_name' => $data['course_name'],
            'limit_number' => $data['limit_number'],
            'course_description' => $data['course_description'],
            'course_owner_user_id' => Auth::user()->id,
        ]);

        return redirect('teacher/courses');
    }

    public function edit_view($id)
    {
        $course = Course::where('id', $id)->first();

        return view('teacher/course_edit', ['course' => $course]);
    }

    protected function edit(Request $request, $id)
    {
        $data = $request->all();

        $course = Course::where('id', $id)->first();

        $course->course_name = $data['course_name'];
        $course->limit_number = $data['limit_number'];
        $course->course_description = $data['course_description'];

        $course->save();

        return redirect('teacher/courses');
    }

    public function delete($id)
    {
        $course = Course::where('id', $id)->first();
        $course->delete();

        Log::where('course_id', $id)->delete();

        return redirect('teacher/courses');
    }

    public function select_view($id)
    {
        $course = Course::where('id', $id)->first();
        return view('teacher/course_selected', ['course' => $course]);
    }

    public function selected_ajax($id)
    {
        $server_side_array = Datatables::collection(Log::where('course_id', '=', $id)->get())
                                        ->removeColumn('course_owner_user_id')
                                        ->addColumn('real_name', function (Log $log) {
                                            return $log->user->real_name;
                                        })
                                        ->editColumn('username', function (Log $log) {
                                            return $log->user->username;
                                        })
                                        ->addColumn('op', '
                                        <div class="am-btn-group">
                                         <a class="am-btn am-btn-primary am-btn-xs" href="/teacher/courses/{{$id}}/score" >登分</a>
                                        </div>')
                                        ->rawColumns(['op'])
                                        ->make(true);

        return $server_side_array;
    }

    public function score_view($log_id)
    {
        $log = Log::where('id', $log_id)->first();
        if($log->course->owner->id != Auth::user()->id)
        {
          exit(0);
        }

        $course = Course::where('id', $log->course_id)->first();
        $user = User::where('id', $log->student_user_id)->first();

        return view('teacher/course_score', ['course' => $course, 'user' => $user, 'log' => $log]);
    }

    public function score(Request $request, $log_id)
    {
        $data = $request->all();
        
        $log = Log::where('id', $log_id)->first();
        if($log->course->owner->id != Auth::user()->id)
        {
          exit(0);
        }

        $log = Log::where('id', $log_id)->first();

        $log->score = $data['score'];

        $log->save();

        return redirect('teacher/courses/'.$log->course->id.'/selected');
    }
}
