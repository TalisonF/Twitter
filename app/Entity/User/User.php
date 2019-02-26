<?php

namespace App\Entity\User;

use App\Entity\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\User\UserRepository")
 * @ORM\Table(name="User")
 */
class User extends Entity
{
    /**
     * @ORM\Column(length=50, nullable=true)
     */
    public $name;

    /**
     * @ORM\Column(length=50, nullable=true)
     */
    public $email;

    /**
     * @ORM\Column(length=32, nullable=true)
     */
    public $password;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}