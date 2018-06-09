@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
	    <div class="col-md-12">
                <h2>Proyecto
                    <small> <?php echo $proyecto[0]->codigo_tesis;?> </small>
                </h2>
                <div class="box box-primary">
                </div>
                <table class="table">
                    <thread>
                    <tr>
                        <td>CODIGO</td>
                        <td>TESIS</td>
                        <td>TUTOR</td>
                        <td>POSTULANTE</td>
                        <td>ESTADO</td>
                        <td>MODALIDAD</td>
                        <td>AREAS</td>
                    </tr>
                    </thread>
                    <tbody>
                    <tr>
                        <td><?php echo $proyecto[0]->codigo; ?></td>
                        <td><?php echo $proyecto[0]->codigo_tesis; ?></td>
                        <td><?php echo $proyecto[0]->cod_prof;?> <?php echo $proyecto[0]->apellido_paterno;?> <?php echo $proyecto[0]->apellido_materno;?></td>
                        <td><?php echo $proyecto[0]->cod_alumno;?> <?php echo $proyecto[0]->apellido_pat;?> <?php echo $proyecto[0]->apellido_mat;?></td>
                        <td><?php echo $proyecto[0]->estado; ?></td>
                        <td><?php echo $proyecto[0]->cod_modalidad; ?></td>
                        <td>
                            @foreach($areas as $area)
                                <label><?php echo $area->nombre_area; ?></label><br>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
                </table>
                <form action="../tribunales/<?php echo $proyecto[0]->codigo;?>" method='GET'>
                    <input style="width:50%; background-position:center;" type='text' placeholder=' Buscar profesional por areas de especializacion' name='area'>
                    <input type="submit" class="btn btn-primary" value="Buscar">
                </form>
                
                @if($filter !== NULL)
                <h2><small> Profesionales Candidatos </small></h2>
                <div class="box box-primary">
                </div>
                <table class="table">
                    <thread>
                    <tr>
                        <td>ID</td>
                        <td>PROFESIONAL</td>
                        <td>CANT. TRIBUNALES</td>
                        <td>OPCION</td>
                    </tr>
                    </thread>
                    <tbody>
                    @foreach($filter as $prof)
                    <tr>
                        <td><?php echo $prof->codigo; ?></td>
                        <td><?php echo $prof->nombre;?> <?php echo $prof->apellido_paterno;?> <?php echo $prof->apellido_materno;?></td>
                        <td></td>
                        <td><a>Add</a></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@stop
