@extends ('layouts.master')
@section ('contenido')

<h2>Mis Areas</h2>
    
    <table class="table">
        <thread>
            @foreach ($areasProf as $area)
            <tr>
                <td><?php echo$area->idArea ?></td>
                <td><?php echo$area->nombre_area?></td>
                <td><?php echo$area->descripcion?></td>
                <td><i class="fa fa-close"></i></td>
            </tr>
            @endforeach
        </thread>
    </table>
    
    <ul id="newArea">
    
        @foreach ($areas as $area)
            @if ($area->id_subarea == null)
            <li><a name="<?php echo$area->idArea; ?>"><?php echo$area->nombre_area; ?></a></li>
                <ul>
                @foreach ($areas as $subarea)
                    @if ($area->idArea == $subarea->id_subarea)
                    <li><?php echo $subarea->nombre_area;?></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    
    </ul>
    <div class="form-group">
        <a href="#dialogo" class="btn btn-primary left" data-toggle="modal">Registrar</a>
        <div class="modal fade" id="dialogo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Desea registrar el area</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
            </div>
        </div>
    </div>
    <script>
        var myList;
        myList = [];
        document.getElementById("newArea").addEventListener("click", function( event ) {
            console.log(event);
        });
    </script>

@endsection