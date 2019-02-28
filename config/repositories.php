<?php
return [

    \App\Repository\User\UserRepository::class => DI\factory(function (\Doctrine\ORM\EntityManager $entityManager) {
        return $entityManager->getRepository('App\Entity\User\User');
    }),

    \App\Repository\Tweet\TweetRepository::class => DI\factory(function (\Doctrine\ORM\EntityManager $entityManager) {
        return $entityManager->getRepository('App\Entity\Tweet\Tweet');
    }),

];