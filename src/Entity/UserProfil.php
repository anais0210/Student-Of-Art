<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepProfilository")
 * class UserProfil
 */
class UserProfil
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @var text
     * @ORM\Column(type="text")
     */
    private $biography;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $photoProfil;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @return id 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return name 
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return lastname 
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }
    /**
     * @param string $lastname
     * @return lastname
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return age 
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return age
     */
    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return biography 
     */
    public function getBiography(): ?string
    {
        return $this->biography;
    }

    /**
     * @param string $biography
     * @return biography
     */
    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * @return photoProfil 
     */
    public function getPhotoProfil(): ?string
    {
        return $this->photoProfil;
    }

    /**
     * @param string $photoProfil
     * @return photoProfil 
     */
    public function setPhotoProfil(string $photoProfil): self
    {
        $this->photoProfil = $photoProfil;

        return $this;
    }

    /**
     * @return country 
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return country 
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return email 
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return email 
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
