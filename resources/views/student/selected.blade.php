@extends('layouts.home')

@section('content')

<table id="selected" class="mdl-data-table" width="100%" cellspacing="0">
  <thead>
      <tr>
          <th>操作</th>
          <th>ID</th>
          <th>课程名</th>
          <th>课程描述</th>
          <th>开课人</th>
          <th>分数</th>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th>操作</th>
          <th>ID</th>
          <th>课程名</th>
          <th>课程描述</th>
          <th>开课人</th>
          <th>分数</th>
      </tr>
  </tfoot>
</table>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="//cdn.staticfile.org/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#selected').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "/student/selected/ajax",
        columns: [
            { data: 'op', name: 'op' },
            { data: 'id', name: 'id' },
            { data: 'course_name', name: 'course_name' },
            { data: 'course_description', name: 'course_description' },
            { data: 'course_owner', name: 'course_owner' },
            { data: 'score', name: 'score' },
        ],
        language: {
            url: '{{ asset("assets/json/Chinese.json") }}'
        }
    } );
} );
</script>

@endsection
