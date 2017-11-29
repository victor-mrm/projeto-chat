<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Perfil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/materialize.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="public/css/modificacoes.css" rel="stylesheet" type="text/css"/>
    </head>
    
        
        <body class="materialize-purp">
        
     <div class="card-panel teal lighten-2 row">
 
      <div class="col s5"><i class="material-icons prefix"><font color="white" size="6">chat</font></i></div>
      <div class="col s1"><a class="grey-text  text-darken-4 " href="home"><font color="white" size="5"><strong>Home</strong></font></a></div>     
      <div class="col s4"><a class="grey-text  text-darken-4 " href="addamigos"><font color="white" size="5"><strong>Add Amigos</strong></font></a></div>  
      <div class="col s2"><a class="grey-text  text-darken-4 " href="logout"><font color="white" size="5"><strong>Log Out</font></strong></a></div> 
    </div>
            
            <div class="container">
                
        <!-- Page Content goes here -->
        
        <img id="idmage" class="circle" src="public/img/padrao.jpg" alt=""/>
   
            </div>
            
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <br><br>
           
            <form method="post" action="/update">
   
     <div class="form-group container">
            <label for="nome"><font size="4">Nome: <?= $pessoa['nome']?></font></label>
            <i class="material-icons prefix">account_circle</i>
            <input class="form-control" type="text" name="nome" id="nome" value=<?= $pessoa['nome'];?> >
    </div>

    <div class="form-group container">
        <label for="idade"><font size="4">Status: <?= $pessoa['status']?></font></label>
        <i class="material-icons prefix">announcement</i>
            <input class="form-control" type="text" name="status" id="status" value=<?= $pessoa['status'];?>>
    </div>
                
    <div class="form-group container">
        <label for="idade"><font size="4">Email: <?= $pessoa['email']?></font></label>
        <i class="material-icons prefix">email</i>
            <input class="form-control" type="email" name="email" id="email" value=<?= $pessoa['email'];?>>
    </div>

    <div class="container">    
             <button class="btn btn-success btn-lg" type="submit">Salvar</button> 
    </div>

        </form>
   <br>
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="/updateFoto">
            <p><input type="file" name="arquivo"/></p>
            <p><button class="btn btn-success btn-lg" name="enviarFoto" type="submit">Alterar foto</button></p>
        </form>
    </div>

    </body>
    
    
</html>
