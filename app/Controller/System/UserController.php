<?php

namespace App\Controller\System;

use App\Controller\Controller;
use App\Repository\User\UserRepository;
use App\Service\User\UserService;

/**
 * Class UserController
 * @package App\Controller\System
 */
class UserController extends Controller
{
    /**
     * @Inject
     * @var UserService
     */
    protected $UserService;


    public function cadastrar($request, $response){
        $post = $request->getParams();

        $success = false;

        if($this->UserService->newUser($post)){
            $success = true;
        }

        $this->view->render($response, "/system/index/inscreverse.php", ['success' => $success]);
    }

    public function autenticar($request, $response){
        $post = $request->getParams();
        
        $user = $this->UserService->validar($post);

        if(is_object($user)){
            return $response->withRedirect("/app/timeline");
        }else{
            return $response->withRedirect("/?erroLogin=true");
        }    
    }

    public function seguir ($request, $response, $hash = null){

        if(!(isset($_SESSION['hash']) && isset($_SESSION['nome']) && isset($_SESSION['id']))){
            return $response->withRedirect("/?erroLogin=force");
        }

        $user = $this->UserService->seguir($hash);
        return $response->withRedirect("/app/quemSeguir?seguindo=true");
    }

    public function pararSeguir ($request, $response, $hash = null){

        $post = $request->getParams();

        if(!(isset($_SESSION['hash']) && isset($_SESSION['nome']) && isset($_SESSION['id']))){
            return $response->withRedirect("/?erroLogin=force");
        }

        $user = $this->UserService->pararSeguir($hash);
        if($post['de'] == 'seguindo'){
            return $response->withRedirect("/app/seguindo");
        }else {
          return $response->withRedirect("/app/quemSeguir");
        }
    }


    public function sair($request, $response){
        \session_destroy();
        return $response->withRedirect("/");
    }
}