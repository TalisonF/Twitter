<?php

namespace App\Service\Sample;

use App\Entity\Sample\Sample;
use App\Repository\Sample\SampleRepository;
use Doctrine\ORM\EntityManager;

class SampleService
{

    /**
     * @Inject
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @Inject
     * @var SampleRepository
     */
    protected $sampleRepository;

    /**
     * LOGICA PARA SALVAR REGISTRO
     * CAMPO UM E OBRIGATORIO
     * SE EXISTE ALGUMA COISA NA HASH - ELE PROCURA ESSE REGISTRO PARA ALTERAR
     * CASO NAO ENCONTRE NADA - VAI CRIAR UM NOVO REGISTRO
     *
     * @param $post
     * @return Sample|object|null
     * @throws \Exception
     */
    public function save($post)
    {

        try {

            if ($post['one'] == null)
                throw new \Exception("Campo Um é obrigatório");

            if ($post['hash'] != null) {

                $sample = $this->sampleRepository->findOneBy(['hash' => $post['hash']]);
                if (!is_object($sample))
                    throw new \Exception("Hash do registro foi passada, porem não encontrada");

            } else {

                $sample = new Sample();
                $sample->setHash($this->genHash());

            }


            $sample->setFieldOne($post['one']);
            $sample->setFieldTwo($post['two']);
            $sample->setFieldThree($post['three']);

            $this->entityManager->persist($sample);
            $this->entityManager->flush();

            return $sample;

        } catch (\Exception $exception) {

            throw new \Exception($exception->getMessage());

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

        $s = $this->sampleRepository->findBy(['hash' => $o]);
        if (is_object($s) && $s->getId()) {
            return $this->genHash();
        }

        return $o;
    }

}