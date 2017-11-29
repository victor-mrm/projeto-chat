<!DOCTYPE html>

<html>

<head>
    <title>Chat</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="public/js/materialize.js" type="text/javascript"></script>
    <link href="public/css/materialize.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="public/css/modificacoes.css" rel="stylesheet" type="text/css" />
</head>

<body class="materialize-purp">


    <div class="card-panel teal lighten-2 row">

        <div class="col s5"><i class="material-icons prefix"><font color="white" size="6">chat</font></i></div>
        <div class="col s1">
            <a class="grey-text  text-darken-4 " href="home">
                <font color="white" size="5"><strong>Home</strong></font>
            </a>
        </div>
        <div class="col s4">
            <a class="grey-text  text-darken-4 " href="addamigos">
                <font color="white" size="5"><strong>Add Amigos</strong></font>
            </a>
        </div>
        <div class="col s2">
            <a class="grey-text  text-darken-4 " href="logout">
                <font color="white" size="5"><strong>Log Out</strong></font>
            </a>
        </div>
    </div>

    <!-- Navbar goes here -->

    <!-- Page Layout here -->
    <div class="row">

        <div class="col s12 m4 l3">
            <!-- Note that "m4 l3" was added -->
            <!-- Grey navigation panel -->

            <br>
            <br>
            <br>
            <br>

            <img class="circle" src="public/img/<?= $pessoa['foto']?>" alt="" />
            <br>
            <br>
            <br>
            <br>
            <a class="col s8 waves-effect waves-light btn" href="/perfil">
                <?= $pessoa['nome'] ?>
            </a>
            <a></a>

        </div>


        <div class="col s12 m8 l9">
            <!-- Note that "m8 l9" was added -->
            <!-- Teal page content
        
                      This content will be:
                  9-columns-wide on large screens,
                  8-columns-wide on medium screens,
                  12-columns-wide on small screens  -->

            <div class="row">
                <form class="col s12" action="/salvarconversa" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="hidden" name="id_amigo" value="<?= $amigo['id'] ?>">
                            <textarea id="textarea1" name="mensagem" class="materialize-textarea"></textarea>
                            <label for="textarea1"></label>
                            <button class="btn waves-effect waves-light" type="submit">Enviar
                            <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <h2 class="header"><font color="white"><strong>
                <?=$amigo['nome']?>
            </strong></font></h2>

        <?php foreach($mensagens as $msg){?>

            <div class="row">
                <div class="col s12 m5">
                    <div class="card-panel teal">
                    <span class="white-text"><strong><?= $msg['remetente'] == $_SESSION['user'] ? 'Eu: ' : 'Amigo: '?></strong>
                            </span>
                        <span class="white-text"> <?= $msg['texto']; ?>
                            </span>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

       


    </div>

    <script src="public/js/materialize.js" type="text/javascript"></script>

</body>



</html>