<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card">
        <div>
            <h2>¡Buen dia!</h2>
            <h4>
                ¡Bienvenido! A nuestro equipo de trabajo,
                Te enviamos nombre de usuario y contraseña.
            </h4>
            <div style="margin-left: 30px">
                <p>
                    <strong>Nombre de Usuario: </strong>{{$info['name']}}<br>
                    <strong>Contraseña: </strong>{{$info['password']}}
                </p>
            </div>
            <h4>
                ¡Nota! Se recomienda que cambie su contraseña por una más segura que solo usted conozca.
            </h4>
            <h4>
                Saludos,<br>Smarte-Tec.
            </h4>
        </div>
    </div>
</body>
</html>
