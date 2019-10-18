<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=1300, initial-scale=1"/>
    <title>scomptec - login</title>
    <meta name="description" content=""/>
    <link rel="stylesheet" href="{{ asset('assets/styles/plugins.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/styles/main.css') }}"/>
  </head>
  <body class="ready">
    <main class="page page-login">
      <div class="login-wrap">           
        <div class="login-box">
          <div class="logo"><img src="{{ asset('assets/images/logo-scomptec.png') }}"/></div>
          <div class="box">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group">
                <label>Username</label>
                <input id="username" name="username" class="form-control" type="text" required autofocus/>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input id="password" name="password" class="form-control" type="password" required/>
              </div>
              @if ($errors->has('username'))
                <div class="alert alert-danger" style="margin-top: 10px"><small>Username atau password Anda salah!</small></div>
              @endif
              <div class="form-action">
                <button class="btn btn-primary" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
    <script src="{{ asset('assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/app.js') }}"></script>
    <script src="{{ asset('assets/scripts/main.js') }}"></script>
  </body>

</html>