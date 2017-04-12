<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{ asset('assets/css/amazeui.min.css') }}"/>
    <style>
      .header {
        text-align: center;
      }
      .header h1 {
        font-size: 200%;
        color: #333;
        margin-top: 30px;
      }
      .header p {
        font-size: 14px;
      }
    </style>
</head>
<body>
    <div id="app">
        <div class="header">
          <div class="am-g">
            <h1>选课系统</h1>
          </div>
          <hr />
        </div>

        <div class="am-g">
          <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">

            @yield('content')

            <hr>
            <p>© 2017 Glzjin. Powered by AmazeUI</p>
          </div>
        </div>

    </div>
</body>
</html>
