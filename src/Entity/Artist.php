<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtistRepository")
 */
class Artist extends BaseUser
{
    const CATEGORY_DRAWING = 'Dessinateur';
    const CATEGORY_PAINT = 'Peintre';
    const CATEGORY_SCULPTOR = 'Sculpteur';
    const CATEGORY_GRAPHICS = 'Grapheur';

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
     * @Assert\NotNull(message="Ce champ est obligatoire")
     */
    private $name;

    /**
     * @var lastName
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message="Ce champ est obligatoire")
     */
    private $lastName;

     /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $birthdayDate;

     /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var string
     * @ORM\Column(type="string", length=255,nullable=true) 
     */
    private $city;

    /**
     * @var upload
     * @ORM\OneToMany(targetEntity="Upload", mappedBy="artist")
     */
    private $uploads;

    /**
     * @var upload
     * @ORM\OneToOne(targetEntity="Upload")
     */
    private $logo;

    /**
     * @var biography
     * @ORM\Column(type="text", nullable=true)
     */
    private $biography;

    /**
     * @var $categories
     * @ORM\Column(type="array")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="PrivateSell", mappedBy="artist")
     */
    private $privateSells;

    public function __construct()
    {
        parent::__construct();
        $this->uploads = new ArrayCollection();
    }

    /**
     * Get categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set categories
     */
    public function setCategories(array $categories)
    {
        $this->categories = $categories;

        return $this;
    }

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
     * Get Biography
     * @return string  
     */
    public function getBiography(): ?string
    {
        return $this->biography;
    }

    /**
     *  Set Biography
     * @param string $biography
     * @return self
     */
    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * @return Upload
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param Upload $logo
     * 
     * @return Artist
     */
    public function setLogo(Upload $logo = null)
    {
        $this->logo = $logo;

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
     * Get birthdayDate.
     * @return \DateTime 
     */
    public function getBirthdayDate(): ?\DateTimeInterface
    {
        return $this->birthdayDate;
    }

    /**
     * Set birthdayDate.
     * 
     * @param \DateTime $birthdayDate
     * 
     * @return Artist
     */
    public function setBirthdayDate(\DateTimeInterface $birthdayDate = null): self
    {
        $this->birthdayDate = $birthdayDate;

        return $this;
    }

    /**
     * Get city
     * @return city 
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Set City.
     * @param string $city
     * @return city 
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function addUpload(Upload $upload): self
    {
        if (!$this->uploads->contains($upload)) {
            $this->uploads[] = $upload;
            $upload->setArtist($this);
        }

        return $this;
    }

    public function removeUpload(Upload $upload): self
    {
        if ($this->uploads->contains($upload)) {
            $this->uploads->removeElement($upload);
            // set the owning side to null (unless already changed)
            if ($upload->getArtist() === $this) {
                $upload->setArtist(null);
            }
        }

        return $this;
    }


}
