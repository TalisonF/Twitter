<?php

namespace App\Controller\System;

use App\Controller\Controller;

/**
 * Class IndexController
 * @package App\Controller\System
 */
class IndexController extends Controller
{
    public function index($request, $response){
        $test = "Bem vindo";
        $this->view->render($response, "/system/index/index.php", ['var_a' =>  $test ]);
    }
}