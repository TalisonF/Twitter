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

}