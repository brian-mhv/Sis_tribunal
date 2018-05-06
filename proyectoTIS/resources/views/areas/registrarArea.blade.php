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
        <a id="icon" ><i class="fa fa-plus-circle" ></i></a></h5>
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
            document.getElementById("icon").addEventListener("click", function( event ) {
            // display the current click count inside the clicked div
                var newNombre = document.createElement("div"); 
                var newlabel1 = document.createElement("label"); 
                var input1 = document.createElement("input");
                input1.name = (document.getElementById("0").id) + 1;
                document.getElementById("0").name = input1.name;
                newNombre.appendChild(newlabel1);
                newNombre.appendChild(input1);

                var newDesc = document.createElement("div"); 
                var newlabel2 = document.createElement("label"); 
                var input2 = document.createElement("textarea");
                newDesc.appendChild(newlabel2);
                newDesc.appendChild(input2);

                var newSubarea = document.getElementById("subarea");
                newSubarea.appendChild(newNombre);
                newSubarea.appendChild(newDesc); //añade texto al div creado. 
                
                // añade el elemento creado y su contenido al DOM 
            });
        </script>
    <!--Fin contenido-->

</div>
@endsection