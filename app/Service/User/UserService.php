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
        
        if(count($this->UserRepository->findBy(['email' => $post['email']])) <= 0 ){
            $user = new User();

            $user->setHash($this->genHash());

            $user->setName($post['nome']);
            $user->setEmail($post['email']);
            $user->setPassword(md5($post['senha']));

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            if(count($this->UserRepository->findBy(['email' => $post['email']])) == 1 ){
                return true;
            }else{
                return false;
            }
            
        }else {
            return false;
        }
    }

    public function validar($post){
        
        $user = $this->UserRepository->findOneBy(['email' => $post['email'] , 'password' => md5($post['senha'])]);
        if(is_object($user) && ($user->getHash() != '' && $user->getName() != '' && $user->getId() != '' )){
            $_SESSION['hash'] = $user->getHash();
            $_SESSION['nome'] = $user->getName();
            $_SESSION['id'] = $user->getId();
            return $user;
        }else{
            return false;
        }
    }

    public function seguir($hash){
        $userSeguir = $this->UserRepository->findOneBy(['hash' => $hash])->getId();
        $userSeguidor = $_SESSION['id'];
        
        $this->UserRepository->addSeguidor($userSeguidor, $userSeguir);

        return $userSeguir;

    }   

    public function pararSeguir($hash){
        $userSeguir = $this->UserRepository->findOneBy(['hash' => $hash])->getId();
        $userSeguidor = $_SESSION['id'];
         
        $this->UserRepository->pararSeguir($userSeguidor, $userSeguir);
    
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