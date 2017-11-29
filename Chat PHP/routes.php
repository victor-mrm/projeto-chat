<?php
//rotas da aplicação
//a variável $uri já contém os dados da rota solicitada

switch ($uri) {


        case '/':
        $loginController->inicio();
        break;

        case '/inicio':
        $loginController->index();  
        break; 

        case '/login';

        $loginController->login();
        break;
    
        case '/logout';

        $loginController->logout();
        break;

        case '/register';
        $loginController->register();
        break;

         case '/post-register';

        $loginController->postRegister();
        break;

        case '/home';

        $testeController->home();
        break;

        case '/addamigos';

        $testeController->adicionar();
        break;

        case '/adduser';

        $testeController->adicionarUser();
        break;

        case '/showadd';

        $testeController->showAdicionar();
        break;

        case '/salvarTexto';

        $testeController->insert();
        break;

        case '/exibirTexto';

        $testeController->exibirTexto();
        break;

        case '/perfil';

        $testeController->perfil();
        break;

        case '/update';

        $testeController->update();
        break;


        case '/updateFoto';

        $testeController->updateFoto();
        break;

        case '/salvarconversa';

        $testeController->salvarconversa();
        break;

        case '/conversa';

        $testeController->conversa();
        break;


      
        
    
    default:
        die('Essa rota não é valida');
        break;
}
