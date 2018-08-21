<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParticipantRepository")
 */
class Participant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PrivateSell", inversedBy="participants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $privateSell;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @ORM\Column(type="boolean")
     */
    private $waiting;

    /**
     * Get id. 
     * @return id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Email.
     * @return string  
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set Email.
     * @param string $email 
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get Password.
     * @return string 
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set Password.
     * @param string $password
     * @return self 
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get privateSell
     * @return privateSell 
     */
    public function getPrivateSell(): ?PrivateSell
    {
        return $this->privateSell;
    }

    /**
     * Set privateSell
     * @param ?privateSell $privateSell
     * @return self 
     */
    public function setPrivateSell(?PrivateSell $privateSell): self
    {
        $this->privateSell = $privateSell;

        return $this;
    }

     /**
     * Get position
     * @return position
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

     /**
     * Set position
     * @param integer $position
     * @return self 
     */
    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

     /**
     * Get Waiting
     * @return bool
     */
    public function getWaiting(): ?bool
    {
        return $this->waiting;
    }

     /**
     * Set Waiting
     * @param bool $waiting
     * @return self 
     */
    public function setWaiting(bool $waiting): self
    {
        $this->waiting = $waiting;

        return $this;
    }
}
