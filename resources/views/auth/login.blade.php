@extends('layouts.app')

@section('content')


      <h3>登录</h3>
      @if ($errors->has('username'))
          <h4>{{ $errors->first('username') }}</h4>
      @endif
      @if ($errors->has('password'))
          <h4>{{ $errors->first('password') }}</h4>
      @endif
      <hr>

      <form class="am-form" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <label for="username">学/工号:</label>
        <input type="text" name="username" id="username" value="">
        <br>
        <label for="password">密码:</label>
        <input type="password" name="password" id="password" value="">
        <br>
        <br />
        <div class="am-cf">
          <input type="submit" name="" value="登 录" type="button" class="am-btn am-btn-primary am-fl">
          <a class="am-btn am-btn-default am-fr" href="{{ route('register') }}" target="_blank">注 册</a>
        </div>
      </form>



@endsection
