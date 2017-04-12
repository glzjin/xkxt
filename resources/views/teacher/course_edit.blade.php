@extends('layouts.home')

@section('content')

<div class="admin-content-body">
  <div class="am-cf am-padding am-padding-bottom-0">
    <div class="am-fl am-cf">
      <strong class="am-text-primary am-text-lg">编辑课程</strong>
    </div>
  </div>

  <hr>

  <div class="am-tabs am-margin" data-am-tabs="">
    <form class="am-form" role="form" method="POST" action="/teacher/courses/{{$course->id}}/edit">
      {{ csrf_field() }}
      <label for="course_name">课程名称:</label>
      <input type="text" name="course_name" id="course_name" value="{{$course->course_name}}">
      <br>
      <label for="limit_number">课程人数:</label>
      <input type="number" name="limit_number" id="limit_number" value="{{$course->limit_number}}">
      <br>

      <label for="course_description">课程描述：</label>
      <input type="text" name="course_description" id="course_description" value="{{$course->course_description}}">
      <br>

      <br />
      <div class="am-margin">
        <button type="submit" class="am-btn am-btn-primary am-btn-xs">编辑</button>
      </div>
    </form>
  </div>
</div>

@endsection
