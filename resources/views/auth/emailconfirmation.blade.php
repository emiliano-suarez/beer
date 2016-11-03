<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Solo queda verificar tu email</h2>
        <div>
            Gracias por registrarte en {{ config('app.name') }} !
            Solo queda que confirmes tu email, haciendo click en este link:
            {{ URL::to('register/confirm/' . $confirmationToken) }}.<br/>
        </div>
    </body>
</html>
