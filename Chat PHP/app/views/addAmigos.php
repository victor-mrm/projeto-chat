<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Emira's Friend</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="public/js/materialize.js" type="text/javascript"></script>
        <link href="public/css/materialize.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    
    <body class="materialize-purp">
        
 <div class="card-panel teal lighten-2 row">
 
      <div class="col s5"><i class="material-icons prefix"><font color="white" size="6">chat</font></i></div>
      <div class="col s1"><a class="grey-text  text-darken-4 " href="home"><font color="white" size="5"><strong>Home</strong></font></a></div>     
      <div class="col s4"><a class="grey-text  text-darken-4 " href="addamigos"><font color="white" size="5"><strong>Add Amigos</strong></font></a></div>  
      <div class="col s2"><a class="grey-text  text-darken-4 " href="logout"><font color="white" size="5"><strong>Log Out</strong></font></a></div> 
    </div>
       <!-- Navbar goes here -->

    <!-- Page Layout here -->
    <div class="row">

      <div class="col s12 m4 l3">
        <!-- Grey navigation panel -->
        <br>
        <br>
        <br>
        <br>
        
        <img class="circle" src="public/img/<?= $pessoa['foto']?>" alt=""/>
        <br>
        <br>
        <br>
        <br>
        <form action="/perfil">

        <button class="col s8 waves-effect waves-light btn"><?= $pessoa['nome'] ?></button>
         </form>
        
      </div>

      <div class="col s12 m8 l9">
        <!-- Teal page content  -->
        
        <div class="row">
            
            
      
    <div class="card-panel teal lighten-2 row col s12 offset-s0"><span class="flow-text"><font color="white"><strong>Adicionar amigos</font></strong></span>
      
      
      
      
      </div>
      
      
      
        </div>
        
        
      

      <?php foreach($inimigo as $i): ?>
        <div>
        <form action="/addamigos" method="post">
        <ul class="collection">
        <li class="collection-item avatar">
      <img src="public/img/<?= $i['foto'] ?>" alt="" class="circle">
      <span class="teal-text text-accent-4"><?= $i['nome'];?></span>
      <p> <?= $i['status'] == '' ? "Hey there,I'm using Emira's Friends" : $i['status']; ?> </p> 
      <input type="hidden" name="id" value=<?=$i['id']?>>
      <button class="waves-effect waves-light btn secondary-content"><i class="material-icons">add</i></button>
    </li>
    
    
        
      </div>
      </form>
      <?php endforeach ?>
    </div>
    
    <script src="public/js/materialize.js" type="text/javascript"></script>
        
    </body>
    
    
    
   
    
    
</html>
