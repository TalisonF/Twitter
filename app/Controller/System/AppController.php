<?php

namespace App\Controller\System;

use App\Controller\Controller;

/**
 * Class IndexController
 * @package App\Controller\System
 */
class AppController extends Controller
{


    public function timeline($request, $response){
        
        $this->view->render($response, "/system/app/timeline.php");
    }

    

}