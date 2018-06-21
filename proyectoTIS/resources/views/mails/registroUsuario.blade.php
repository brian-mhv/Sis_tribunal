<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Registro como nuevo usuario</title>
</head>
<body>
    <p>Usted ha sido regitrado como nuevo usuario en el Sistema de Asignacion de Tribunales para Proyecto de grado.</p>
    <p>Estos son los datos con los cuales se le creo la cuenta:</p>
    <ul>
        <li>Nombre: {{ $user->user->name }}</li>
        <li>Correo: {{ $user->user->email }}</li>
        <li>Contraseña: {{ $user->user->password }}</li>
    </ul>
    <p>Usted puede acceder a su cuenta desde <a href="hashtag.hosting.cs.umss.edu.bo">Asignacion de Tribunales</a></p>
</body>
</html>