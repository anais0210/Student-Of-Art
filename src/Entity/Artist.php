<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert ;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtistRepository")
 */
class Artist extends BaseUser
{
    /**
     * @var id
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var name
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var lastName
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @var upload
     * 
     * @ORM\OneToMany(targetEntity="Upload", mappedBy="artist")
     */
    private $uploads;

    /**
     * @var profil
     * @ORM\OneToOne(targetEntity="UserProfil", cascade={"persist"}) 
     */
    private $profil;

    /**
     * @var description
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @return id 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Name. 
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set Name.
     * @return $self
     * @param string $name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get LastName.
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Set LastName
     * @param string $lastName
     * @return self 
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get Uploads.
     * @return string 
     */
    public function getUploads(): ?string
    {
        return $this->upload;
    }

    /**
     * Set Upload.
     * @param string $upload
     * @return self
     */
    public function setUploads(string $upload): self
    {
        $this->upload = $upload;

        return $this;
    }

    /**
     * Get Description
     * @return string  
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     *  Set Description.
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get Profil.
     * @return UserProfil  
     */
    public function getProfil(): ?UserProfil
    {
        return $this->profil;
    }

    /**
     * Set profil 
     * @param UserProfil $profil
     * @return self
     */
    public function setProfil(UserProfil $profil = null): self
    {
        $this->profil = $profil;

        return $this;
    }
}
