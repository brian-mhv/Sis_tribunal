@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
	    <div class="col-md-12">
                <h2>Proyectos</h2>
                <div class="box box-primary">
                </div>
                <table class="table table-hover">
                    <tr class="success">
                        <td>ID</td>
                        <td>CODIGO</td>
                        <td>TUTOR</td>
                        <td>POSTULANTE</td>
                        <td>TITULO PROYECTO</td>
                        <td>ESTADO</td>
                        <td>MODALIDAD</td>
                        <td>TRIBUNAL</td>

                    </tr>
                    <tbody>
                        <?php
                        foreach($proyectos as $rows) {?>
                    <tr>
                        <td><?php echo $rows->codigo; ?></td>
                        <td><?php echo $rows->codigo_tesis; ?></td>
                        <td><?php echo $rows->cod_prof;?> <?php echo $rows->apellido_paterno;?> <?php echo $rows->apellido_materno;?></td>
                        <td><?php echo $rows->cod_alumno;?> <?php echo $rows->apellido_pat;?> <?php echo $rows->apellido_mat;?></td>
                        <td style="width:30%"><?php echo $rows->nombre; ?></td>
                        <td>
                        @if($rows->estado == 't' || $rows->estado == 'f')
                        <span class="label label-success">Aprobado para defensa</span>
                        @endif
                        @if($rows->estado == 'Proceso de revision')
                        <span class="label label-warning">Proceso de Revision</span>
                        @endif
                        @if($rows->estado == 'finalizado')
                        <span class="label label-default">Proyeto Defendido</span>
                        @endif
                        </td>
                        <td><?php echo $rows->cod_modalidad; ?></td>
                        <td><a href="../tribunales/<?php echo $rows->codigo;?>" class="btn btn-primary">Asignar</a></td>
                    </tr>
                    <?php }?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
@stop