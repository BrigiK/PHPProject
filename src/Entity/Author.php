<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
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
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Book", mappedBy="id_author")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $idBook->addIdAuthor($this);
        }

        return $this;
    }

    public function removeIdBook(Book $idBook): self
    {
        if ($this->id_book->contains($idBook)) {
            $this->id_book->removeElement($idBook);
            $idBook->removeIdAuthor($this);
        }

        return $this;
    }
}
