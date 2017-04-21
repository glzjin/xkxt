@extends('layouts.home')

@section('content')

<table id="students" class="mdl-data-table" width="100%" cellspacing="0">
  <thead>
      <tr>
          <th>操作</th>
          <th>ID</th>
          <th>学号</th>
          <th>姓名</th>
          <th>分数</th>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th>操作</th>
          <th>ID</th>
          <th>学号</th>
          <th>姓名</th>
          <th>分数</th>
      </tr>
  </tfoot>
</table>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="//cdn.staticfile.org/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#students').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "/teacher/courses/{{$course->id}}/selected/ajax",
        columns: [
            { data: 'op', name: 'op' },
            { data: 'id', name: 'id' },
            { data: 'username', name: 'username' },
            { data: 'real_name', name: 'real_name' },
            { data: 'score', name: 'score' }
        ],
        language: {
            url: '{{ asset("assets/json/Chinese.json") }}'
        }
    } );
} );
</script>

@endsection
