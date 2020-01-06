<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Author", inversedBy="id_book")
     */
    private $id_author;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Publisher", inversedBy="id_book")
     */
    private $id_publisher;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Column(type="integer")
     */
    private $nr_of_books;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\LectureCard", mappedBy="id_book")
     */
    private $id_lectureCard;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $rating;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $reviews;

    /**
     * @ORM\Column(type="integer")
     */
    private $nrOfPages;

    public function __construct()
    {
        $this->id_author = new ArrayCollection();
        $this->id_publisher = new ArrayCollection();
        $this->id_lectureCard = new ArrayCollection();
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

    /**
     * @return Collection|Author[]
     */
    public function getIdAuthor(): Collection
    {
        return $this->id_author;
    }

    public function addIdAuthor(Author $idAuthor): self
    {
        if (!$this->id_author->contains($idAuthor)) {
            $this->id_author[] = $idAuthor;
        }

        return $this;
    }

    public function removeIdAuthor(Author $idAuthor): self
    {
        if ($this->id_author->contains($idAuthor)) {
            $this->id_author->removeElement($idAuthor);
        }

        return $this;
    }

    /**
     * @return Collection|Publisher[]
     */
    public function getIdPublisher(): Collection
    {
        return $this->id_publisher;
    }

    public function addIdPublisher(Publisher $idPublisher): self
    {
        if (!$this->id_publisher->contains($idPublisher)) {
            $this->id_publisher[] = $idPublisher;
        }

        return $this;
    }

    public function removeIdPublisher(Publisher $idPublisher): self
    {
        if ($this->id_publisher->contains($idPublisher)) {
            $this->id_publisher->removeElement($idPublisher);
        }

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getNrOfBooks(): ?int
    {
        return $this->nr_of_books;
    }

    public function setNrOfBooks(int $nr_of_books): self
    {
        $this->nr_of_books = $nr_of_books;

        return $this;
    }

    /**
     * @return Collection|LectureCard[]
     */
    public function getIdLectureCard(): Collection
    {
        return $this->id_lectureCard;
    }

    public function addIdLectureCard(LectureCard $idLectureCard): self
    {
        if (!$this->id_lectureCard->contains($idLectureCard)) {
            $this->id_lectureCard[] = $idLectureCard;
            $idLectureCard->addIdBook($this);
        }

        return $this;
    }

    public function removeIdLectureCard(LectureCard $idLectureCard): self
    {
        if ($this->id_lectureCard->contains($idLectureCard)) {
            $this->id_lectureCard->removeElement($idLectureCard);
            $idLectureCard->removeIdBook($this);
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(?float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getReviews(): ?int
    {
        return $this->reviews;
    }

    public function setReviews(?int $reviews): self
    {
        $this->reviews = $reviews;

        return $this;
    }

    public function getNrOfPages(): ?int
    {
        return $this->nrOfPages;
    }

    public function setNrOfPages(int $nrOfPages): self
    {
        $this->nrOfPages = $nrOfPages;

        return $this;
    }
}
