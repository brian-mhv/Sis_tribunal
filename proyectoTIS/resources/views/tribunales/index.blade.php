@extends ('layouts.master')
@section ('contenido')

<div class="box-body">
    <div class="row">
	    <div class="col-md-12">
                <h2>Tribunales</h2>
                <div class="box box-primary">
                </div>
                <table class="table">
                    <thread>
                    <tr>
                        <td>ID</td>
                        <td>PROFESIONAL 1</td>
                        <td>PROFESIONAL 2</td>
                        <td>PROFESIONAL 3</td>
                        <td>TITULO PROYECTO</td>
                        <td>FECHA DE DEFENSA</td>
                    </tr>
                    </thread>
                    <tbody>
                        <?php
                        foreach($tribunal as $rows) {?>
                    <tr>
                    
                        <td><?php echo $rows->idTribunal; ?></td>
                        @foreach ($profesional as $prof)
                        @if ($prof->codigo == $rows->id_profesional1)
                            <td><?php echo $rows->id_profesional1; ?></td>
                        @endif
                        @endforeach
                        @foreach ($profesional as $prof)
                        @if ($prof->codigo == $rows->id_profesional2)
                            <td><?php echo $rows->id_profesional2; ?></td>
                        @endif
                        @endforeach
                        @foreach ($profesional as $prof)
                        @if ($prof->codigo == $rows->id_profesional3)
                            <td><?php echo $rows->id_profesional3; ?></td>
                        @endif
                        @endforeach
                        <td><?php echo $rows->id_tesis; ?></td>
                        <td><?php echo $rows->fecha_defensa; ?></td>
                    </tr>
                    <?php }?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
@stop