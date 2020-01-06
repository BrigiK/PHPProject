<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LectureCardRepository")
 */
class LectureCard
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="id_lectureCard", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Book", inversedBy="id_lectureCard")
     */
    private $id_book;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    public function __construct()
    {
        $this->id_book = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getIdBook(): Collection
    {
        return $this->id_book;
    }

    public function addIdBook(Book $idBook): self
    {
        if (!$this->id_book->contains($idBook)) {
            $this->id_book[] = $idBook;
        }

        return $this;
    }

    public function removeIdBook(Book $idBook): self
    {
        if ($this->id_book->contains($idBook)) {
            $this->id_book->removeElement($idBook);
        }

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
}
