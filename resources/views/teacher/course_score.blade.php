@extends('layouts.home')

@section('content')

<div class="admin-content-body">
  <div class="am-cf am-padding am-padding-bottom-0">
    <div class="am-fl am-cf">
      <strong class="am-text-primary am-text-lg">课程登分</strong>
    </div>
  </div>

  <hr>

  <div class="am-tabs am-margin" data-am-tabs="">
    <form class="am-form" role="form" method="POST" action="/teacher/courses/{{$log->id}}/score">
      {{ csrf_field() }}
      <label for="course_name">课程名称:</label>
      <input type="text" value="{{$course->course_name}}" disabled="">
      <br>
      <label for="limit_number">目标学生姓名:</label>
      <input type="text" value="{{$user->real_name}}" disabled="">
      <br>

      <label for="course_description">目标学生学号</label>
      <input type="text" value="{{$user->username}}" disabled="">
      <br>

      <label for="course_description">分数</label>
      <input type="number" name="score" id="score">
      <br>

      <br />
      <div class="am-margin">
        <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交</button>
      </div>
    </form>
  </div>
</div>

@endsection
