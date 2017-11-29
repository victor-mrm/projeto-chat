<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="public/css/materialize.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Página de cadastro</title>
</head>

<body class="materialize-purp">
     <div class="container">
         
         <h1><strong><font color="#f1f8e9">Cadastre-se no Chat</font></strong></h1>
    <br><br>

    <?= $flash ? '<p class="card-content white-text">' . $flash . '</p>' : ''?>

    <form method="post" action="/post-register">
     <div class="form-group">
        <label for="nome"><font size="4">Nome</font></label>
            <input class="form-control" type="text" name="nome" id="nome" value="">
    </div>
    
    <div class="form-group">
        <label for="idade"><font size="4">Email</font></label>
            <input class="form-control" type="email" name="email" id="email" value="">
     </div>
     <div class="form-group">
        <label for="idade"><font size="4">Senha</font></label>
            <input class="form-control" type="password" name="senha" id="senha" value="">
    </div>
    
    <div class="form-group">
        <label for="idade"><font size="4">Confirmar senha</font></label>
            <input class="form-control" type="password" name="csenha" id="csenha "value="">
    </div>

    <button class="btn btn-success btn-lg" type="submit">Cadastrar</button>
</div>

    <script src="public/js/materialize.js" type="text/javascript"></script>

</body>

</html>
