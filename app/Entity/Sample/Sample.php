<?php

namespace App\Entity\Sample;

use App\Entity\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Sample\SampleRepository")
 * @ORM\Table(name="samples")
 */
class Sample extends Entity
{


    /**
     * @ORM\Column(length=50, nullable=true)
     */
    public $field_one;

    /**
     * @ORM\Column(length=50, nullable=true)
     */
    public $field_two;

    /**
     * @ORM\Column(length=50, nullable=true)
     */
    public $field_three;

    /**
     * @return mixed
     */
    public function getFieldOne()
    {
        return $this->field_one;
    }

    /**
     * @param mixed $field_one
     */
    public function setFieldOne($field_one)
    {
        $this->field_one = $field_one;
    }

    /**
     * @return mixed
     */
    public function getFieldTwo()
    {
        return $this->field_two;
    }

    /**
     * @param mixed $field_two
     */
    public function setFieldTwo($field_two)
    {
        $this->field_two = $field_two;
    }

    /**
     * @return mixed
     */
    public function getFieldThree()
    {
        return $this->field_three;
    }

    /**
     * @param mixed $field_three
     */
    public function setFieldThree($field_three)
    {
        $this->field_three = $field_three;
    }


}