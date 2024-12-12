<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[UniqueEntity('title', message: '{{ value }} ist schon vorhanden!')]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Assert\NotBlank(message: 'Das darf nicht leer sein')]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Das darf nicht leer sein')]
    private ?string $author = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Das darf nicht leer sein')]
    private ?int $pages = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Das darf nicht leer sein')]
    private ?string $publisher = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Das darf nicht leer sein')]
    private ?string $publisherEmail = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message: 'Das darf nicht leer sein')]
    private ?\DateTimeInterface $publisherAt = null;

    #[ORM\Column(enumType: GenreTypeEnum::class)]
    private ?GenreTypeEnum $genre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getPages(): ?int
    {
        return $this->pages;
    }

    public function setPages(int $pages): static
    {
        $this->pages = $pages;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): static
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getPublisherEmail(): ?string
    {
        return $this->publisherEmail;
    }

    public function setPublisherEmail(string $publisherEmail): static
    {
        $this->publisherEmail = $publisherEmail;

        return $this;
    }

    public function getPublisherAt(): ?\DateTimeInterface
    {
        return $this->publisherAt;
    }

    public function setPublisherAt(?\DateTimeInterface $publisherAt): static
    {
        $this->publisherAt = $publisherAt;

        return $this;
    }

    public function getGenre(): ?GenreTypeEnum
    {
        return $this->genre;
    }

    public function setGenre(?GenreTypeEnum $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getPublisherAtString() :string
    {
        $string = $this->getPublisherAt();
        $string->format('d-m-Y');
    }

}
