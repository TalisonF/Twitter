<?php

namespace App\Entity\User;

use App\Entity\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="app\Repository\User\UserRepository")
 * @ORM\Table(name="User")
 */
class User extends Entity
{
    
    /**
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinTable(name="usuarios_seguidores",
     *      joinColumns={@ORM\JoinColumn(name="seguindo_user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="seguidor_user_id", referencedColumnName="id", unique=false)}
     *      )
     */
    protected $seguindo;

    
    /**
     * @ORM\OneToMany(targetEntity="\App\Entity\Tweet\Tweet", mappedBy="user")
     */
    protected $tweet;
    
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


    public function __construct(){
        $this->tweet = new ArrayCollection();
        $this->seguindo = new ArrayCollection();
        
        parent::__construct();      
    }
    public function getTweet()
    {
        return $this->tweet;
    }

    public function setTweet($tweet)
    {
        $this->tweet = $tweet;
    }

    public function addTweet($tweet)
    {
        $this->tweet->add($tweet);
    }

    public function removeTweet($tweet)
    {
        $this->tweet->remove($tweet);
    }

    //fim tweet

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
        $this->email = $Email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    
    public function getSeguindo()
    {
        return $this->seguindo;
    }

    public function setSeguindo($seguindo)
    {
        $this->seguindo = $seguindo;
    }

    public function addSeguindo($seguindo)
    {
        $this->seguindo->add($seguindo);
    }
}