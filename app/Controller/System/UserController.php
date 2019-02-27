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

    public function sair($request, $response){
        print_r($_SESSION);
        \session_destroy();
        return $response->withRedirect("/");
    }
}