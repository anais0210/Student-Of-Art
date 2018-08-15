<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToOne(targetEntity="Artist", inversedBy="name")
     */
    private $artist;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberPlaces;

    /**
     * @ORM\ManyToOne(targetEntity="Upload", inversedBy="image")
     */
    private $oeuvres;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameEvent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Participant", mappedBy="privateSell", orphanRemoval=true)
     */
    private $participants;

    public function __construct()
    {
        $this->oeuvres = new ArrayColletion();
        $this->participants = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(string $artist): self
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

    public function getOeuvres(): ?ArrayCollection
    {
        return $this->oeuvres;
    }

    public function addOeuvre(Upload $oeuvre): self
    {
        if (!$this->oeuvres->contains($oeuvre)) {
            $this->oeuvres->addElement($oeuvre);
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

    public function setOeuvres(array $oeuvre): self
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

    /**
     * @return Collection|Participant[]
     */
    public function getParticipants(): Collection
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
