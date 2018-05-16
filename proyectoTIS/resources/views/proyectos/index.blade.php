@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
	    <div class="col-md-12">
                <h2>Proyectos</h2>
                <div class="box box-primary">
                </div>
                <table class="table">
                    <thread>
                    <tr>
                        <td>CODIGO</td>
                        <td>COD. TESIS</td>
                        <td>TUTOR</td>
                        <td>POSTULANTE</td>
                        <td>TITULO PROYECTO</td>
                        <td>ESTADO</td>
                        <td>MODALIDAD</td>

                    </tr>
                    </thread>
                    <tbody>
                        <?php
                        foreach($proyectos as $rows) {?>
                    <tr>
                        <td><?php echo $rows->codigo; ?></td>
                        <td><?php echo $rows->codigo_tesis; ?></td>
                        <td><?php echo $rows->cod_prof;?> <?php echo $rows->apellido_paterno;?> <?php echo $rows->apellido_materno;?></td>
                        <td><?php echo $rows->cod_alumno;?> <?php echo $rows->apellido_pat;?> <?php echo $rows->apellido_mat;?></td>
                        <td><?php echo $rows->nombre; ?></td>
                        <td><?php echo $rows->estado; ?></td>
                        <td><?php echo $rows->cod_modalidad; ?></td>
                        
                    </tr>
                    <?php }?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
@stop