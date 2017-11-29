<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="public/css/materialize.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <title>Login</title>
    </head>

    <body class="materialize-purp">

        <div class="center-align">
            <h1><strong><font color="#f1f8e9">Bem vindo ao Emira's Friend</font></strong></h1>
            <br><br>
            
        </div>

        <div class="container">
            <h2><font color="#f1f8e9">Faça o Login</font></h2>
            <br><br>

            <?= $flash ? '<p class="card-content white-text">' . $flash . '</p>' : ''?>

            <form method="post" action="/login">
                <input type="text" name="email" placeholder="Email" required autofocus>
                <br><br>
                <input type="password" name="senha" placeholder="Senha" required>
                <br><br>

                <button class="btn btn-success btn-lg" type="submit">Logar</button>
            </form>

            <br>

            <form action="/register">

            <button class="col s8 waves-effect waves-light btn">Cadastro</button>
                                      
            </form>

        </div>

            <script src="materialize/js/materialize.js" type="text/javascript"></script>

    </body>
</html>
