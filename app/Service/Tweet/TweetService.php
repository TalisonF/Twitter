<?php

namespace App\Service\Tweet;

use App\Entity\Tweet\Tweet;
use App\Repository\Tweet\TweetRepository;
use App\Repository\User\UserRepository;
use Doctrine\ORM\EntityManager;

class TweetService
{

    /**
     * @Inject
     * @var EntityManager
     */
    protected $entityManager;

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
    
    public function newTweet($post){
        $tweet = new Tweet();
        
        $tweet->setTweet($post['tweet']);
        $tweet->setHash($this->genHash());
        $tweet->setUser( $this->UserRepository->findOneBy(['id' => $_SESSION['id']]));
        
        $this->entityManager->persist($tweet);
        $this->entityManager->flush();

       return true;

    }

    public function deleteTweet($hash){
        if($hash != null){
            $tweet = $this->TweetRepository->findOneBy(['hash' => $hash]);
            if(is_object($tweet)){
                $tweet->setDeletedAt(new \Datetime());
                $this->entityManager->persist($tweet);
                $this->entityManager->flush();
                return true;
            }
        }else{
            return false;
        }
    }
    /**
     * GERA UMA HASH UNICA PARA REGISTRO
     * SE EXISTE ELE GERA UMA NOVA - ATE ENCONTRAR
     *
     * @return string
     */
    protected function genHash()
    {
        $a = substr(md5(openssl_random_pseudo_bytes(20)), -8);
        $b = substr(md5(openssl_random_pseudo_bytes(20)), -4);
        $c = substr(md5(openssl_random_pseudo_bytes(20)), -8);
        $o = "$a-$b-$c";

        $s = $this->TweetRepository->findBy(['hash' => $o]);
        if (is_object($s) && $s->getId()) {
            return $this->genHash();
        }

        return $o;
    }

}