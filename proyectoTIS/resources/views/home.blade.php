@extends ('layouts.master')

@section ('contenido')
<h2>Sistema de Asignacion de Tribunales para Proyectos finales de 
    grado
</h2>
<h3><small> Facultad de Ciencias y Tecnologia </small></h3>
<div class="box box-primary"></div>

<div class="container-fluid">                       

    <!--Añadir contenido-->
    <section id="introduction">
        <h2 class="page-header"><a href="#introduction">Introducción</a></h2>
        <p class="lead">
            <b>Tribunal - </b><mall>SIS</small>  Dentro la Actividad universitaria, administrativa academica y 
            como parte culminate de la formacion de profesionales, se tiene la presentacion
            de un proyecto final que permite a los estudiantes obtener su grado academico. 
            Se elaboro este sistema para faciliar y agilizar la asignacion de tribunales ya 
            que se manejaba internamente en la universidad con un sistema "rustica" con el
            fin de que los estudiantes llegan a poder egresar su Profesion.
        </p>
    </section>
          <div class="row">
            <div class="col-md-6">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Antecedente</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Objetivo </a></li>
                  <li><a href="#tab_3" data-toggle="tab">Finalidad </a></li>
                 
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">                
                    <p>Una Rama de la Informatica es el desarrollo de sisetmas de informacion, la misma que
                        que ha sido desarrollada de manera general a actividaddes empresarial/intitucional</p>
                        El desarrollo de estos sistemas dependiendo de la complejidad y alcance han generado gran
                        avances en las areas subyascentes como el estudio de los sistemas de informacion, los procesos
                        de desarrollo y la infenieria de software.
                        La posibilidad de tener sistemas que se desempelan utilizados la gran red de computadoras
                        ha ocasionado que la informacion incursion en las complejidades de las aplicaiones web.
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <p> <b>></b> Registro Manual y por lote informacion. </p>
                    <p> <b>></b> Mosrtar los estados de proyectos. </p>
                    <p> <b>></b> Asignar Profesionales - Docente/Invitados como tribunal. </p>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    La finalidad de este sistema permitir una mejor organizacion en la asignacion de tribunales
                    dando una utilidad portable y facil de manejar, posibilitando que que el uso de toda esta
                    informacion optimeze a la hora de designar tribunal con sus respectivas caracteristicas de cada 
                    proyecto.
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->

            <div class="col-md-6">
              <!-- Custom Tabs (Pulled to the right) -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                <h2 class="page-header"><a href="#introduction"> Mecanismo Asignacion de Tribunal</a></h2>                 
                </ul>
                <div class="tab-content">                
                    <p> Se debe trabajar en un perfil de proyecto, registrado, desarrollado, y una vez 
                        aprobado por el tutor y el docente de proyecto final a traves de una carta 
                        presentada a los Honorables Consejos de Carrera: se debe proceder a la fase de
                        revision la misma que esta delegada a una comision de tres personas, las mismas
                        que se denominan tribunales del proyecto, su mision es revisar la idoneidad, 
                        cumpliendo y satisfacibilidad del proyecto. Esta tarea de la designacion de 
                        tribunales es realizada por los Honorables Consejeros de Carrera, y para ello se
                        recurre a los profesionales inicialmente que sondocentes de las carreras, de la 
                        FCYT y eventualmente profesionales del medio. En el mejor de los casos se considera 
                        el mundo de proyectos que tiene asignado que no sea tutor. 
                  </div><!-- /.tab-pane -->
                
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
          </div> <!-- /.row -->
    
    <section>
    <h2 class="page-header"><a href="#introduction">Modalidad de Titularizacion</a></h2>
    <div class="col-md-4 col-sm-4">
              <div class="box box-default collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">TESIS </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                Disertación escrita presentada públicamente para obtener un grado académico 
                universitario, producto del estudio teórico de un tema original, pudiendo 
                ajustarse a cualquier modelo o paradigma de investigación y realizada con 
                rigor metodológico.
                </div><!-- /.box-body -->
              </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-4 col-sm-4">
              <div class="box box-default collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">DIPLOMADO </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                Es una de las modalidades que se esta implementando en sus primeras pruebas 
                dando poder concluir los estudios los estudiantes egresados con unos cursos 
                de 6 meses aproximado y como conclusion un proyecto con lo aprendido dando 
                asi doble titularizacion
                </div><!-- /.box-body -->
              </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-4 col-sm-4">
              <div class="box box-default collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">PROYECTO DE GRADO  </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                Es el trabajo de investigación, programación y diseño de solución a algún 
                problema o situación, aplicando estrategias apropiadas para su elaboración. 
                Este trabajo se realiza bajo la supervisión de un guía de la institución u 
                organización y del tutor este trabajo normalmente es asignado por la universidad. 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-4 col-sm-4">
              <div class="box box-default collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">TRABAJO DIRIGIDO  </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                Es un trabajo práctico realizado en instituciones públicas o en organismos 
                sin fines de lucro, con la complejidad suficiente como para ser abordado en 
                un proyecto de titulación. Se trata de desarrollar un sistema computacional, 
                a nivel de diseño, sobre la base de los términos de referencia de la institución.
                </div><!-- /.box-body -->
              </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-4 col-sm-4">
              <div class="box box-default collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">EXCELENCIA ACADEMICA</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                Cada fin de semestre, el o la estudiante que tuviera el mejor promedio de su
                curso (sin abandonos, reprobaciones y aprobaciones con exámenes de mesa) 
                Es decir, no necesitará cursar la materia “Modalidad de titulación” y su nota 
                será cien (100).
                </div><!-- /.box-body -->
              </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-4 col-sm-4">
              <div class="box box-default collapsed-box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">APSCRIPCION </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                La adscripción consiste en la realización de un trabajo práctico dentro de la 
                Universidad Mayor de San Simón que tenga la complejidad suficiente como para 
                ser abordado en un proyecto de titulación. Los trabajos a realizar deben encontrarse
                en los ámbitos académicos, de investigación, interacción y/o gestión universitaria. 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
    </div><!-- /.col -->
    </section>
    <!--Fin contenido-->

</div>
@endsection