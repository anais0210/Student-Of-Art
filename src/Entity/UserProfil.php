<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserProfilRepository")
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
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * @var text
     * @ORM\Column(type="text", nullable=true)
     */
    private $biography;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photoProfil;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profil;

    public function __toString()
    {
        return '';
    }

    /**
     * Get Id.
     * @return id 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Age.
     * @return age 
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * Set Age.
     * @param int $age
     * @return age
     */
    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get Biography.
     * @return biography 
     */
    public function getBiography(): ?string
    {
        return $this->biography;
    }

    /**
     * Set Biography.
     * @param string $biography
     * @return biography
     */
    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get PhotoProfil.
     * @return photoProfil 
     */
    public function getPhotoProfil(): ?string
    {
        return $this->photoProfil;
    }

    /**
     * Set PhotoProfil
     * @param string $photoProfil
     * @return photoProfil 
     */
    public function setPhotoProfil(string $photoProfil): self
    {
        $this->photoProfil = $photoProfil;

        return $this;
    }

    /**
     * Get Country.
     * @return country 
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Set Country.
     * @param string $country
     * @return country 
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get Profil.
     * @return profil 
     */
    public function getProfil(): ?string
    {
        return $this->profil;
    }

    /**
     * Set Profil.
     * @param string $profil
     * @return self
     */
    public function setProfil(string $profil): self
    {
        $this->profil = $profil;

        return $this;
    }
}
