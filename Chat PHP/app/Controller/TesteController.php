<?php

namespace Project\Controller;

use Project\Db\QueryBuilder;
use Project\Util\Flash;

class TesteController
{

    public function home()

    {

        //acessar o bd
        $q = new QueryBuilder();
       
       
        //busca os dados
        $dados = $q->selectAmigos($_SESSION['user']);
        //mostra o nome da pessoa
        $pessoa = $q->select('usuario', ['id' => $_SESSION['user']], true);

        //acessar a view
        require './app/views/sala.php';

    }


    public function perfil()
    {
        //recebe as alterações do form
        $dado['nome'] =  isset($_POST['nome']) ? $_POST['nome'] :'';
        $dado['email'] =  isset($_POST['email']) ? $_POST['email'] :'';
        //acessar o bd
        $q = new QueryBuilder();
        //busca os dados
        $pessoa = $q->select('usuario', ['id' => $_SESSION['user']], true);

        //acessar pagina
        require './app/views/perfil.php';

    }

    
      public function update()
    {
        //recebe as alterações do form
        $dado['nome'] =  isset($_POST['nome']) ? $_POST['nome'] :'';
        $dado['email'] =  isset($_POST['email']) ? $_POST['email'] :'';
        $dado['status'] =  isset($_POST['status']) ? $_POST['status'] :'';
        //acessar o bd
        $q = new QueryBuilder();
        //busca os dados
        $pessoa = $q->select('usuario', ['id' => $_SESSION['user']], true);
        $newdados = $q->update($dado, $_SESSION['user']);

        //acessar pagina
        require './app/views/perfil.php';

    }

          public function updateFoto()
    {
        //recebe as alterações do form
        //$dado['arquivo'] =  isset($_FILES['arquivo']) ? $_FILES['arquivo'] :'';
      
      
        if(isset($_FILES['arquivo'])){
            $novo_nome = md5(time()) . '.jpg';
            $dir = "public/img/";
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir . $novo_nome);
        }
        
        //acessar o bd
        $q = new QueryBuilder();
        //busca os dados
        $newdados = $q->updateFoto($novo_nome, $_SESSION['user']);

        //acessar pagina
        //require './app/views/perfil.php';
        header('Location: /perfil');
        
    }

    public function salvarconversa()
    {
        
        //acessar o banco
        $q = new QueryBuilder();

        //filtra os dados
        $dado['remetente'] = $_SESSION['user'];
        $dado['destino'] = $_POST['id_amigo'];
        $dado['texto'] = nl2br(htmlentities($_POST['mensagem'], ENT_QUOTES, 'UTF-8'));

        //print_r($dado); die();
        //inserir
        $dados = $q->insert('conversas', $dado);

        //acessar pagina
        //dúvida: como continuar trafegando o id_amigo na hora de redirecionar para a função conversa
        header('Location: /conversa?id_amigo=' . $dado['destino']);

    }

    public function conversa()
    {
        
        //autentica o id da conversa
         $dado['id_amigo'] = $_GET['id_amigo'];
         //print_r($dado);                
         //die();

         $q = new QueryBuilder();

         $pessoa = $q->select('usuario', ['id' => $_SESSION['user']], true);
         $amigo = $q->select('usuario', ['id' => $dado['id_amigo']] , true);
        

        $mensagens = $q->selectEnv($_SESSION['user'], $dado['id_amigo']);
        //print_r($mensagens);die();
        //dúvida: como irei fazer um foreach para selecionar as mensagens recebidas
        //$recebida = $q->selectRec($dado['id_amigo']);
        

          require './app/views/privado.php';
    }

    public function adicionar()
    {
        //receber dados
        $dado['Usuario_id1'] = $_POST['id'];
        $dado['Usuario_id'] = $_SESSION['user'];
      
        //acessar o bd
        $q = new QueryBuilder();

        //inserir
        $dados = $q-> insert('amizade', $dado);



        // Inserir para o outro amigo
        $dado['Usuario_id1'] = $_SESSION['user'];
        $dado['Usuario_id'] = $_POST['id'];
      
        //acessar o bd
        $q = new QueryBuilder();

        //inserir amizade
        $dados = $q-> insert('amizade', $dado);



        //redireciona para inverter os campos de add
        header('Location: /showadd');

    }


        
    public function showAdicionar()
    {
        
        //acessar o bd
        $q = new QueryBuilder();

        //mostra o nome do user logado
        $pessoa = $q->select('usuario', ['id' => $_SESSION['user']], true);

        //mostra os inimigos
        $inimigo = $q->selectInimigos($_SESSION['user']);

    
        require './app/views/addAmigos.php';

    }
























  

}

