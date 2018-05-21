<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Asignacion-Tribunales</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href={{asset('css/bootstrap.css')}}>
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{asset('css/font-awesome.css')}}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset('css/AdminLTE.css')}}>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href={{asset('css/_all-skins.css')}}>
    <!--link rel="apple-touch-icon" href={{asset('img/apple-touch-icon.png')}}-->
    <link rel="shortcut icon" href={{asset('img/hashTag.ico')}}>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

<!--//////////////////////////////////////////////////////////////////////////////
//////////    Cabezera estaticas superior para todas las paginas       //////////
////////////////////////////////////////////////////////////////////////////////-->
      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>FCYT</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Tribunal</b> - SIS</span> 
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less-->
              <li class="dropdown user user-menu">
              
              @if($user == null)
                <a href="../login" class="dropdown-toggle" > 
                  <span class="hidden-xs">Iniciar Sesion</span>                  
                </a>
              @endif
              @if($user != null)
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                  <span class="hidden-xs"> <?php echo$user[0]->correo; ?> <i class="fa fa-angle-down pull-right"></i></span>               
              </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Ver perfil</a></li>
                  @if($user[0]->nivel == 4)
                  <li><a href="#">Informacion del proyecto</a></li>
                  <li><a href="#">Informacion del tutor</a></li>
                  <li><a href="#">Estado de proyecto</a></li>
                  @endif
                  @if($user[0]->nivel == 2 || $user[0]->nivel == 3)
                  <li><a href="#">Tribunales asignados</a></li>
                  <li><a href="#">Proyectos para revision</a></li>
                  <li><a href="../misAreas">Anadir areas de interes</a></li>
                  @endif
                  @if($user[0]->nivel == 2)
                  <li><a href="#">Anadir areas de conocimiento</a></li>
                  @endif
                  @if($user[0]->nivel == 1)
                  <li><a href="#">Anadir administrador</a></li>
                  @endif
                  <li><a href="/logout">Cerrar sesion</a></li>
                </ul>
              @endif
              </li>
            </ul>
          </div>
        </nav>
      </header>
<!--/////////////////////////////////////////////////////////////////////////////
//////////  FIN Cabezera estaticas superior para todas las paginas   ///////////
///////////////////////////////////////////////////////////////////////////////-->

<!--------------------------------------------------------------------------------------------------->

<!--////////////////////////////////////////////////////////////////////////////
/////////////            BARRA DE MENU LADO IZQUIERDO            //////////////
//////////////////////////////////////////////////////////////////////////////-->
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel-->      
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <!--pagina INICIO del sistema-->
            <li>
              <a href="../home">
                <i class="fa fa-home"></i><span>Inicio</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="../docentes">
                <i class="fa fa-users"></i>
                <span>Docentes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../docentes"><i class="fa fa-circle-o"></i> Lista de docentes</a></li>
                <li><a href="../docentes/registrar"><i class="fa fa-circle-o"></i> Registrar Docente</a></li>
                <li><a href="../docentes/registrarlote"><i class="fa fa-circle-o"></i> Registrar por Lote</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="/invitados">
                <i class="fa fa-users"></i>
                <span>Invitados</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../invitados"><i class="fa fa-circle-o"></i> Lista de invitados</a></li>
                <li><a href="../invitados/registrar"><i class="fa fa-circle-o"></i> Registrar Invitado</a></li>
                <li><a href="../invitados/registrarlote"><i class="fa fa-circle-o"></i> Registrar por Lote</a></li>
              </ul>
            </li>
            
            <!--Pagina de PROYECTO del sistema-->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder-open-o"></i>
                <span>Proyecto Grado</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../proyectos"><i class="fa fa-circle-o"></i> Lista de proyectos</a></li>
                <li><a href="../proyectos/registrarProy"><i class="fa fa-circle-o"></i> Registrar Proyecto</a></li>
                <li><a href="../proyectos/registrarProyLote"><i class="fa fa-circle-o"></i> Registrar por Lote</a></li>
              </ul>
            </li>
             
            <!--Pagina de AREA del sistema-->
            <li class="treeview">
              <a href="../areas">
                <i class="fa fa-th"></i>
                <span>Areas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../areas"><i class="fa fa-circle-o"></i> Lista de areas</a></li>
                <li id="regAreas"><a href="../areas/registrar"><i class="fa fa-circle-o"></i> Registrar area</a></li>
                <li><a href="../areas/registrarlote"><i class="fa fa-circle-o"></i> Registrar por lote</a></li>
              </ul>
            </li>

            <!--li class="treeview">
              <a href="/estudiantes">
                <i class="fa fa-users"></i>
                <span>Estudiantes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../estudiantes"><i class="fa fa-circle-o"></i> Lista de estudiantes</a></li>
                <li><a href="../estudiantes/registrar"><i class="fa fa-circle-o"></i> Registrar Estudiante</a></li>
              </ul>
            </li>

            <!--Pagina de AYUDA del sistema-->
             <li>
              <a href="../help">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
              </a>
            </li>

            <!--Pagina de ACER DE del sistema-->
            <li>
              <a href="../about">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-blue">HashTag.com</small>
              </a>
            </li>              
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
<!--///////////////////////////////////////////////////////////////////////////
//////////           FIN BARRA DE MENU LADO IZQUIERDO              ///////////
/////////////////////////////////////////////////////////////////////////////-->
       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">  
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                    <!--Contenido-->
                      @yield('contenido')
		                <!--Fin Contenido-->
                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->

<!---Pie de Pagina-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2018 <a href="www.HashTag.com">Hashtag Co.</a></strong> Todos los derechos reservados.
      </footer>

      <script>
            document.getElementById("logout").addEventListener("click", function( event ) {
            // display the current click count inside the clicked div
              <?php $user = null; ?> 
            });
        </script>
    <!-- jQuery 2.1.4 -->
    <script src={{asset('js/jQuery-2.1.4.min.js')}}></script>
    <!-- Bootstrap 3.3.5 -->
    <script src={{asset('js/bootstrap.min.js')}}></script>
    <!-- AdminLTE App -->
    <script src={{asset('js/app.js')}}></script>
    
  </body>
</html>
