<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
class Entity
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(length=50, nullable=true)
     */
    protected $hash;

    /**
     * @ORM\Column(type="datetime", options={"default" : "CURRENT_TIMESTAMP"})
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime", options={"default" : "CURRENT_TIMESTAMP"})
     */
    protected $updated_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $deleted_at;

    public function __construct()
    {
        $this->created_at = new \Datetime();
        $this->updated_at = new \Datetime();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param mixed $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * @param mixed $deleted_at
     */
    public function setDeletedAt($deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

}