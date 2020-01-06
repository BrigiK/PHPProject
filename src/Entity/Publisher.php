<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PublisherRepository")
 */
class Publisher
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Book", mappedBy="id_publisher")
     */
    private $id_book;

    public function __construct()
    {
        $this->id_book = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

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
            $idBook->addIdPublisher($this);
        }

        return $this;
    }

    public function removeIdBook(Book $idBook): self
    {
        if ($this->id_book->contains($idBook)) {
            $this->id_book->removeElement($idBook);
            $idBook->removeIdPublisher($this);
        }

        return $this;
    }
}
