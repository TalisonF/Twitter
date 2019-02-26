<?php
return [

    \App\Repository\Sample\SampleRepository::class => DI\factory(function (\Doctrine\ORM\EntityManager $entityManager) {
        return $entityManager->getRepository('App\Entity\Sample\Sample');
    }),

    \App\Repository\Client\ClientRepository::class => DI\factory(function (\Doctrine\ORM\EntityManager $entityManager) {
        return $entityManager->getRepository('App\Entity\Client\Client');
    }),

    \App\Repository\User\UserRepository::class => DI\factory(function (\Doctrine\ORM\EntityManager $entityManager) {
        return $entityManager->getRepository('App\Entity\User\User');
    }),

    \App\Repository\Task\TaskRepository::class => DI\factory(function (\Doctrine\ORM\EntityManager $entityManager) {
        return $entityManager->getRepository('App\Entity\Task\Task');
    }),


];