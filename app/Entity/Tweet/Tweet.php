<?php

namespace App\Entity\Tweet;

use App\Entity\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="app\Repository\Tweet\TweetRepository")
 * @ORM\Table(name="Tweet")
 */
class Tweet extends Entity
{
    
    /**
     * @ORM\ManyToOne(targetEntity="\App\Entity\User\User", inversedBy="tweet")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    public $user;

    /**
     * @ORM\Column(length=50, nullable=false)
     */
    public $tweet;

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getTWeet()
    {
        return $this->tweet;
    }

    public function setTweet($Tweet)
    {
        $this->tweet = $Tweet;
    }

}