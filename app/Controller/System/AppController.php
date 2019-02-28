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
        
        $tweets = $this->TweetRepository->findBy(['deleted_at' => null],['created_at' => 'desc']) ;
        $this->view->render($response, "/system/app/timeline.php" , [ 'tweets' => $tweets]);
    }

    public function tweetar ($request, $response){
        $post = $request->getParams();
        
        $this->TweetService->newTweet($post);
        
        return $response->withRedirect("/app/timeline");
    }

    

}