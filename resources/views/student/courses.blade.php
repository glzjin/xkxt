@extends('layouts.home')

@section('content')
<br>
<div class="am-u-sm-12 am-u-md-6">
  <div class="am-btn-toolbar">
    <div class="am-btn-group am-btn-group-xs">
      <a class="am-btn am-btn-default" href="/teacher/courses/add" target="_blank"> 新增</a>
    </div>
  </div>
</div>

<table id="courses" class="mdl-data-table" width="100%" cellspacing="0">
  <thead>
      <tr>
          <th>操作</th>
          <th>ID</th>
          <th>课程名</th>
          <th>总人数</th>
          <th>已选人数</th>
          <th>课程描述</th>
          <th>开课人</th>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th>操作</th>
          <th>ID</th>
          <th>课程名</th>
          <th>总人数</th>
          <th>已选人数</th>
          <th>课程描述</th>
          <th>开课人</th>
      </tr>
  </tfoot>
</table>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="//cdn.staticfile.org/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#courses').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "/student/courses/ajax",
        columns: [
            { data: 'op', name: 'op' },
            { data: 'id', name: 'id' },
            { data: 'course_name', name: 'course_name' },
            { data: 'limit_number', name: 'limit_number' },
            { data: 'selected_number', name: 'selected_number' },
            { data: 'course_description', name: 'course_description' },
            { data: 'course_owner', name: 'course_owner' },
        ],
        language: {
            url: '{{ asset("assets/json/Chinese.json") }}'
        }
    } );
} );
</script>

@endsection
