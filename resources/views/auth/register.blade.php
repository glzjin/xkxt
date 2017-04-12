@extends('layouts.app')

@section('content')


      <h3>注册</h3>
      @if ($errors->has('username'))
          <h4>{{ $errors->first('username') }}</h4>
      @endif
      @if ($errors->has('password'))
          <h4>{{ $errors->first('password') }}</h4>
      @endif
      @if ($errors->has('real_name'))
          <h4>{{ $errors->first('real_name') }}</h4>
      @endif
      <hr>

      <form class="am-form" role="form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <label for="username">学/工号:</label>
        <input type="text" name="username" id="username" value="">
        <br>
        <label for="password">密码:</label>
        <input type="password" name="password" id="password" value="">
        <br>
        <label for="role">角色:</label>
        <select id="role" class="form-control select" name="role" required>
            <option value="1">教师</option>
            <option value="2">学生</option>
        </select>
        <br>

        <label for="real_name">姓名：</label>
        <input type="text" name="real_name" id="real_name" value="">
        <br>

        <br />
        <div class="am-cf">
          <input type="submit" name="" value="注 册" type="button" class="am-btn am-btn-primary am-fl">
          <a class="am-btn am-btn-default am-fr" href="{{ route('login') }}" target="_blank">登 录</a>
        </div>
      </form>



@endsection
