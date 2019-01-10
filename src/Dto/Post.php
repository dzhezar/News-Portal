<?php

namespace App\Dto;



/**
 * Data transfer object for Post entity.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class Post
{
    private $image;
    private $description;
    private $publicationDate;
    private $category;


    public function __construct(string $description, ?\DateTimeInterface $publicationDate, Category $category, ?string $image)
    {
        $this->description = $description;
        $this->publicationDate = $publicationDate;
        $this->category = $category;
        $this->image = $image;
    }

    public function setImage(string $src): void
    {
        $this->image = $src;
    }

    public function getImage(): string
    {
        return $this->image ?? 'default.png';
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPublicationDate(): ?string
    {
        if ($this->publicationDate != null) {
            return $this->publicationDate->format('d-m-Y');
        }
        return null;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
}
