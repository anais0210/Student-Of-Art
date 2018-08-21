<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * class upload
 * 
 * @ORM\Entity(repositoryClass="App\Repository\UploadRepository")
 */
class Upload
{
    /**
     * @var integer
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var text
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotNull(message="Ce champ est obligatoire")
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="Artist", inversedBy="uploads")
     */
    private $artist;

    /**
     * @var string
     * @Assert\File(mimeTypes={ "image/jpeg" })
     * @Assert\NotNull(message="Ce champ est obligatoire")
     */
    private $image;

    /**
     * @var datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $fileName;

     /**
     * @var $category
     * @ORM\Column(type="string", nullable=true)
     * @Assert\NotNull(message="Ce champ est obligatoire")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="PrivateSell", inversedBy="oeuvres")
     */
    private $privateSell;

    /**
     * @return Datetime
     */
    public function __construct()
    {
        $this->date = new \Datetime();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Get title. 
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * Set title. 
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
    /**
     * Get description.
     * @return string 
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * Set description 
     * @param string $description
     * @return self 
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    /**
     * Get artiste
     * @return string 
     */
    public function getArtiste(): ?string
    {
        return $this->artiste;
    }
    /**
     * Set artiste
     * @param string $artiste
     * @return self 
     */
    public function setArtiste($artiste): self
    {
        $this->artiste = $artiste;

        return $this;
    }
    /**
     * Get image
     * @return Upload 
     */
    public function getImage(): ?UploadedFile
    {
        return $this->image;
    }
    /**
     * Set image
     * @param Upload $upload
     * 
     * @return self 
     */
    public function setImage(UploadedFile $image): self
    {
        $this->image = $image;

        return $this;
    }
    /**
     * Get date
     * @return DateTimeInterface 
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }
    /**
     * Set date
     * @param \DateTimeInterface $date
     * @return DateTimeInterface 
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

     /**
     * Get fileName
     * @return string 
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }
    /**
     * Set fileName
     * @param string $FileName
     * @return self 
     */
    public function setFileName($fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get category
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * Set category
     */
    public function setCategory(string $category)
    {
        $this->category = $category;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getPrivateSell(): ?PrivateSell
    {
        return $this->privateSell;
    }

    public function setPrivateSell(PrivateSell $privateSell = null): self
    {
        $this->privateSell = $privateSell;

        return $this;
    }
}
