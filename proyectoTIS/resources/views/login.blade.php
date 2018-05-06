<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href={{asset('css/bootstrap.css')}}>
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{asset('css/font-awesome.css')}}>
    <!-- Ionicons -->
    <link rel="stylesheet" href={{asset('css/ionicons.min.css')}}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset('css/AdminLTE.css')}}>
    <!-- iCheck -->
    <link rel="stylesheet" href={{asset('plugins/iCheck/square/blue.css')}}>
  </head>
  <body class="hold-transition login-page">

<div class="login-box">
      <div class="login-logo">
        <a><b>Tribunal</b> - SIS</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Inicia sesíon para comenzartu sesíon</p>
        <form action="home" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="@Correo Electronico">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Contraseña">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="social-auth-links">
            <a href="login.#myModal">Olvidé mi contraseña</a><br>     
           </div><!-- /.social-auth-links -->
          <div class="row">
          
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Recuérdame
                </label>
              </div>
            </div><!-- /.col -->
            
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesíon</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>-------------------------------------------------------------------------</p>
          <p>¿No tienes Cuenta?</p>
        <a href="register.html" class="text-center">Registrate</a>
        </div><!-- /.social-auth-links -->
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <!-- jQuery 2.1.4 -->
    <script src={{asset('js/jQuery-2.1.4.min.js')}}></script>
    <!-- Bootstrap 3.3.5 -->
    <script src={{asset('js/bootstrap.min.js')}}></script>
    <!-- iCheck -->
    <script src={{asset('plugins/iCheck/icheck.min.js')}}></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>

