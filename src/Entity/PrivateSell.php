<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
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

    public function __construct()
    {
        $this->oeuvres = new ArrayCollection();
        $this->participants = new ArrayCollection();
        $this->date = new \Datetime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(Artist $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getNumberPlaces(): ?int
    {
        return $this->numberPlaces;
    }

    public function setNumberPlaces(int $numberPlaces): self
    {
        $this->numberPlaces = $numberPlaces;

        return $this;
    }

    public function getOeuvres(): \Traversable
    {
        return $this->oeuvres;
    }

    public function addOeuvre(Upload $oeuvre): self
    {
        if (!$this->oeuvres->contains($oeuvre)) {
            $this->oeuvres->add($oeuvre);
            $oeuvre->setPrivateSell($this);
        }

        return $this;
    }

    public function removeOeuvre(Upload $oeuvre): self
    {
        if ($this->oeuvres->contains($oeuvre)) {
            $this->oeuvres->removeElement($oeuvre);
            $oeuvre->setPrivateSell(null);
        }

        return $this;
    }

    public function setOeuvres(array $oeuvres): self
    {
        $this->oeuvres = $oeuvres;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNameEvent(): ?string
    {
        return $this->nameEvent;
    }

    public function setNameEvent(string $nameEvent): self
    {
        $this->nameEvent = $nameEvent;

        return $this;
    }

     public function getAddress(): ?string
    {
        return $this->address;
    }

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

    public function addParticipant(Participant $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
            $participant->setPrivateSell($this);
        }

        return $this;
    }

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

    public function isPast(): bool
    {
        return new \DateTime() > $this->date;
    }
}
