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
        <p class="login-box-msg">Iniciar Sesion</p>
        <form id="form" action="../home/" method="POST" role="form">
          {{ csrf_field() }}
          @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                  @endforeach
              </ul>
          </div>
          @endif
          <div class="form-group">
            <input name="correo" type="email" class="form-control" placeholder="@Correo Electronico">
          </div>
          <div class="form-group">
            <input name="pass" type="password" class="form-control" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Iniciar Sesion">
          </div>
        </form>
        <!-------------------------------->
        <!--div class="social-auth-links">
          <a href="#reestablecer" data-toggle="modal">Olvidé mi contraseña</a><br>     
          <div class="modal fade" id="reestablecer">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Reestablecer Contraseña</h4>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <input type="email" class="form-control" placeholder="Introduzca correo electronico para reestablecer su contraseña">
                        </div>
                        <div class="form-group">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <input type="submit" href="#dialogo" class="btn btn-primary" value="Enviar" data-toggle="modal">
                        </div>
                      </form>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="dialogo">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                  <h4>Su contraseña ha sido enviada</h4>
              </div>
            </div>
          </div>
        </div>

        <div class="social-auth-links text-center">
          <p>¿No tienes Cuenta?</p>
        <a href="register.html" class="text-center">Registrate</a>
        </div-->
        <!-------------------------------->
        <!-- /.social-auth-links -->
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

