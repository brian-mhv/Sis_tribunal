@extends ('layouts.master')

@section ('contenido')
<h2> Acerca del Sistema 
</h2>
<div class="box box-primary"></div>
<div class="container-fluid">                       

    <!--Añadir contenido-->
    <h2 class="page-header"><a href="#introduction">Arquitectura del <b>Tribunal -</b> SIS</a></h2>
    <pre class="hierarchy bring-up"><code class="language-bash" data-lang="bash">Paquete de estructura de Laravel 5.4

            proyectoTIS/
            ├── app/
            │   ├── Console
            │   ├── Exceptions
            │   ├── Http
            │   └── Provides
            ├── bootstrap/
            │   └── Cache
            ├── config
            ├── database
            ├── public/
            │   ├── css/
            │   │   ├── bootstrap.css
            │   │   ├── _all-skins.css
            │   │   ├── font-awesome.css
            │   │   └── ionicons.min.css
            │   ├── fonts
            │   ├── img
            │   ├── js/
            │   │   ├── app.js
            │   │   ├── bootstrap.min.js
            │   │   └── jQuery-2.1.4.min.js
            │   └── plugins
            ├── resource/
            │   ├── assets
            │   ├── lang
            │   └── view/
            │       ├── areas
            │       ├── docente
            │       ├── invitados
            │       ├── layouts
            │       ├── proyecto
            │       ├── tribunal
            │       ├── about.blade.php
            │       ├── help.blade.php
            │       ├── home.blade.php
            │       └── login.blade.php
            ├── routes
            │   ├── api.php
            │   ├── console.php
            │   └── web.php
            ├── Sgl
            ├── Storage
            ├── tests
            ├── vendor
            ├── .env
            ├── artisan
            ├── composer.json
            ├── composer.lock
            ├── Leeme.txt
            ├── package.json
            ├── phpunit.xml
            ├── readme.md
            ├── server.php
            ├── webpack.mix.js

</code></pre>
    <!--Fin contenido-->

</div>
@endsection