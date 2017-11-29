<?php
namespace Project\Controller;

use Project\Db\QueryBuilder;
use Project\Util\Flash;

class LoginController
{
        public function inicio()
    {
        // recebe qualquer mensagem flash disparada anteriormente
        $flash = Flash::getFlash();

        //mostra a view de registro
        require './app/views/index.php';
    }

    //esse método retorna a página de registro
    public function register()
    {
        // recebe qualquer mensagem flash disparada anteriormente
        $flash = Flash::getFlash();

        //mostra a view de registro
        require './app/views/cadastro.php';
    }

    // esse método recebe os dados para registrar um usuário
    public function postRegister()
    {
        //recebe os dados de email e senha
        $dados['nome'] = htmlentities($_POST['nome'], ENT_QUOTES);
        $dados['senha'] = htmlentities($_POST['senha'], ENT_QUOTES);
        $dados['email'] = htmlentities($_POST['email'], ENT_QUOTES);
        $csenha = htmlentities($_POST['csenha'], ENT_QUOTES);

        //compara os dois campos de senha, devolvendo uma mensagem flash caso sejam diferentes
        if ($dados['senha'] !== $csenha) {
            Flash::setFlash('As senhas não coincidem');
            header('Location: /register');
            exit;
        }

        // criptografa a senha para guardar no banco de dados. 
        // a sequencia que passei é bem fraca, mas é um exemplo de salt
        $dados['senha'] = crypt($dados['senha'], '123456');

        $q = new QueryBuilder();
        $cadastrado = $q->insert('usuario', $dados);
        
        // se não foi possivel realizar o cadastro, como por exemplo, email repetido
        // dispara um mensagem flash
        if (!$cadastrado) {
            Flash::setFlash('Email já cadastrado');
            header('Location: /register');
            exit;
        }


        // guarda o nome do usuario na session
       // $_SESSION['user'] = $dados['nome'];

        //chama o método de configuração inicial do jogo
        header('Location: /');

    }

    //metodo para realizar o login do usuário
    public function login()
    {
        $dados['email'] = htmlentities($_POST['email'], ENT_QUOTES);
        $dados['senha'] = htmlentities($_POST['senha'], ENT_QUOTES);

        $dados['senha'] = crypt($dados['senha'], '123456');
        
        $q = new QueryBuilder();

        
        $cadastrou = $q->select('usuario', [
            'email' => $dados['email'], 
            'senha' => $dados['senha']

        ], true);

       
       
        // se o usuário não foi encontrado no banco de dados
        // emite uma mensagem de erro
        if (!$cadastrou) {
            
            Flash::setFlash('Dados Inválidos');
            header('Location: /');
            exit;

        }
            // autentica o usuário
            $_SESSION['user'] = $cadastrou['id'];
            

            header('Location: /home');   

        

        
        
    }
    

    public function logout()
    {
        //remove todas variáveis criadas de sessão
        session_unset();

        //devolve para a página inicial
        header('Location: /');
    }

    

    
}
