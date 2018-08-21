<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * class PrivateSell
 * @ORM\Entity()
 */
class PrivateSell
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Artist", inversedBy="privateSells")
     */
    private $artist;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *  min = 1,
     *  max = 15,
     *     minMessage = "Minimum {{ limit }} participant",
     *     maxMessage = "Maximun {{ limit }} participants"
     * )
     * @Assert\NotNull(message="Ce champ est obligatoire")
     *
     */
    protected $numberPlaces;

    /**
     * @ORM\OneToMany(targetEntity="Upload", mappedBy="privateSell")
     */
    private $oeuvres;

    /**
     * @ORM\Column(type="datetime",nullable=false)
     * @Assert\NotNull(message="Ce champ est obligatoire")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotNull(message="Ce champ est obligatoire")
     */
    private $nameEvent;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotNull(message="Ce champ est obligatoire")
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Participant", mappedBy="privateSell", orphanRemoval=true)
     */
    private $participants;

    /**
     * @return ArrayCollection
     * @return ArrayCollection
     * @return DateTime 
     */
    public function __construct()
    {
        $this->oeuvres = new ArrayCollection();
        $this->participants = new ArrayCollection();
        $this->date = new \Datetime();
    }

    /**
     * Get id. 
     * @return id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Artist.
     * @return string 
     */
    public function getArtist(): ?string
    {
        return $this->artist;
    }

    /**
     * Set Artist.
     * @param Artist $artist
     * @return self 
     */
    public function setArtist(Artist $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get NumberPlaces.
     * @return integer 
     */
    public function getNumberPlaces(): ?int
    {
        return $this->numberPlaces;
    }

    /**
     * Set NumberPlaces.
     * @param int $numberPlaces
     * @return self 
     */
    public function setNumberPlaces(int $numberPlaces): self
    {
        $this->numberPlaces = $numberPlaces;

        return $this;
    }

    /**
     * Get Oeuvres.
     * @return Traversable oeuvres 
     */
    public function getOeuvres(): \Traversable
    {
        return $this->oeuvres;
    }

    /**
     * add Oeuvre.
     * @param Upload $oeuvre
     * @return self 
     */
    public function addOeuvre(Upload $oeuvre): self
    {
        if (!$this->oeuvres->contains($oeuvre)) {
            $this->oeuvres->add($oeuvre);
            $oeuvre->setPrivateSell($this);
        }

        return $this;
    }

    /**
     * remove Oeuvre.
     * @param Upload $oeuvre
     * @return self  
     */
    public function removeOeuvre(Upload $oeuvre): self
    {
        if ($this->oeuvres->contains($oeuvre)) {
            $this->oeuvres->removeElement($oeuvre);
            $oeuvre->setPrivateSell(null);
        }

        return $this;
    }

    /**
     * Set Oeuvres.
     * @param array $oeuvres 
     * @return self
     */
    public function setOeuvres(array $oeuvres): self
    {
        $this->oeuvres = $oeuvres;

        return $this;
    }

    /**
     * Get Date.
     * @return DateTimeInterface 
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    /**
     * Set Date.
     * @param \DateTimeInterface $date
     * @return date 
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get nameEvent.
     * @return string  
     */
    public function getNameEvent(): ?string
    {
        return $this->nameEvent;
    }

    /**
     * Set nameEvent.
     * @param string $nameEvent
     * @return self 
     */
    public function setNameEvent(string $nameEvent): self
    {
        $this->nameEvent = $nameEvent;

        return $this;
    }

    /**
     * Get Address.
     * @return string 
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Set Address.
     * @param string $address 
     * @return self
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection|Participant[]
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * add Participant
     * @param Participant $participant
     * @return self 
     */
    public function addParticipant(Participant $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
            $participant->setPrivateSell($this);
        }

        return $this;
    }

    /**
     * remove Participant
     * @param Participant $participant
     * @return self
     */
    public function removeParticipant(Participant $participant): self
    {
        if ($this->participants->contains($participant)) {
            $this->participants->removeElement($participant);
            if ($participant->getPrivateSell() === $this) {
                $participant->setPrivateSell(null);
            }
        }

        return $this;
    }
    /**
     * isPast 
     * @return DateTime 
     */
    public function isPast(): bool
    {
        return new \DateTime() > $this->date;
    }
}
