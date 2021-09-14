<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Mensaje Recibido con exíto</title>
</head>
<body>
    <p >Hola! {{ $about_mail["name"] }}</p>
    <p>Hemos recibido tus datos, nuestro esquipo se pondra en contacto contigo por el numero: {{$about_mail["phone"]}}</p>
    <p>Gracias por preferirnos!</p>
   
</body>
</html>