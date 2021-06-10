<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Mensaje Recibido con exíto</title>
</head>
<body>
    <p style="color: rebeccapurple">Hola! {{ $about_mail["name"] }}</p>
    <p>mensaje recibido:{{ $about_mail["message"] }}</p>
    <p>mensaje recibido:{{ $about_mail["phone"] }}</p>
</body>
</html>