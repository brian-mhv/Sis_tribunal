@extends ('layouts.master')

@section ('contenido')
<h2>Registrar area 
    <small> Contenido </small>
</h2>
<div class="box box-primary"></div>
<div class="container-fluid">                       

    <!--Añadir contenido-->
    <form id="form" action="/areas" method="POST" role="form">
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
        <input type="hidden" name="elementos" id="var">
        <div class="form-group">
            <label>Nombre</label>
            <input name="nombre" class="form-control" placeholder="Nombre de area">
        </div>
        <div class="form-group">
            <label>Descripcion</label>
            <textarea name="descripcion" class="form-control" rows="2" 
            placeholder="Ingrese la descripcion del area"></textarea>
        </div>

        <div id="subarea" class="form-group">
        <h5><label id="0">Agregar subarea </label>
        <a id="icon" ><i class="fa fa-plus" ></i></a></h5>
        </div>

        <div class="form-group">
        <a href="#dialogo" class="btn btn-primary" data-toggle="modal">Registrar</a>
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
        </div>
        </form>
        <script>
            $var = 0;
            $var2 = 0;
            document.getElementById("icon").addEventListener("click", function( event ) {
            // display the current click count inside the clicked div
                var newNombre = document.createElement("div");
                var input1 = document.createElement("input");
                input1.class = "form-control";
                input1.placeholder = "Nombre de Subarea";
                input1.name = $var + 1;
                $var = $var + 1;
                $var2 = $var;
                newNombre.appendChild(input1);

                var newSubarea = document.getElementById("subarea");
                newSubarea.appendChild(newNombre);
                document.getElementById("var").value = $var2; 
            });
        </script>
</div>
@endsection