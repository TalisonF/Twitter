<?php

namespace App\Service\User;

use App\Entity\User\User;
use App\Repository\User\UserRepository;
use Doctrine\ORM\EntityManager;

class UserService
{

    /**
     * @Inject
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @Inject
     * @var UserRepository
     */
    protected $UserRepository;

    public function newUser($post){
        
        $user = new User();

        $user->setHash($this->genHash());
        $user->setName($post['nome']);

        $user->setEmail($post['email']);
        $user->setPassword($post['senha']);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return true;
        
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

        $s = $this->UserRepository->findBy(['hash' => $o]);
        if (is_object($s) && $s->getId()) {
            return $this->genHash();
        }

        return $o;
    }

}