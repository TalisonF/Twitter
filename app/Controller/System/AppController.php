<?php

namespace App\Controller\System;

use App\Controller\Controller;
use App\Service\Tweet\TweetService;
use App\Repository\Tweet\TweetRepository;

use App\Repository\User\UserRepository;


use App\Repository;

/**
 * Class IndexController
 * @package App\Controller\System
 */
class AppController extends Controller
{
    /**
     * @Inject 
     * @var TweetService
     */
    protected $TweetService;

    /**
     * @Inject
     * @var TweetRepository
     */
    protected $TweetRepository;

     /**
     * @Inject
     * @var UserRepository
     */
    protected $UserRepository;

    public function timeline($request, $response){

        if(!(isset($_SESSION['hash']) && isset($_SESSION['nome']) && isset($_SESSION['id']))){
            return $response->withRedirect("/?erroLogin=force");
        }
        
        $tweets = $this->TweetRepository->getTweets() ;
        $QtdeTweets = count($this->TweetRepository->findBy(['user' => $_SESSION['id'], 'deleted_at' => null ]  ));
        $qtdeSeguindo = count($this->UserRepository->qtdeSeguindo($_SESSION['id'] ));
        $qtdeSeguidores = count($this->UserRepository->qtdeSeguidores($_SESSION['id'] ));
        $this->view->render($response, "/system/app/timeline.php" , [ 
            'tweets' => $tweets,
            'QtdeTweets' => $QtdeTweets,
            'qtdeSeguindo' => $qtdeSeguindo,
            'qtdeSeguidores' => $qtdeSeguidores
        ]);
    }

    public function tweetar ($request, $response){

        if(!(isset($_SESSION['hash']) && isset($_SESSION['nome']) && isset($_SESSION['id']))){
            return $response->withRedirect("/?erroLogin=force");
        }

        $post = $request->getParams();
        
        $this->TweetService->newTweet($post);
        
        return $response->withRedirect("/app/timeline");
    }

    public function RemoverTweet($request, $response, $hash = null){
       
        if(!(isset($_SESSION['hash']) && isset($_SESSION['nome']) && isset($_SESSION['id']))){
            return $response->withRedirect("/?erroLogin=force");
        }

        if($this->TweetService->deleteTweet($hash)){
            return $response->withRedirect("/app/timeline?Excluir=true");
         }else{
            return $response->withRedirect("/app/timeline?Excluir=false");
        }
    }

    public function quemSeguir ($request, $response, $pesquisarPor =null){

        if(!(isset($_SESSION['hash']) && isset($_SESSION['nome']) && isset($_SESSION['id']))){
            return $response->withRedirect("/?erroLogin=force");
        }

        $usuarios = null;
        if($pesquisarPor != null ){
            $usuarios = $this->UserRepository->getUser($pesquisarPor , $_SESSION['id']);
        }
        $QtdeTweets = count($this->TweetRepository->findBy(['user' => $_SESSION['id'], 'deleted_at' => null ]  ));
        $qtdeSeguindo = count($this->UserRepository->qtdeSeguindo($_SESSION['id'] ));
        $qtdeSeguidores = count($this->UserRepository->qtdeSeguidores($_SESSION['id'] ));
        
        $this->view->render($response, "/system/app/quemSeguir.php", [ 
           'usuarios' => $usuarios,
           'QtdeTweets' => $QtdeTweets,
           'qtdeSeguindo' => $qtdeSeguindo,
           'qtdeSeguidores' => $qtdeSeguidores
        ] );
        
    }


    

}