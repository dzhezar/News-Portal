<?php

namespace App\Dto;

/**
 * Data transfer object for Category entity.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class Category
{
    private $name;
    private $description;
    private $slug;
    private $isPublished;

    public function __construct (string $name, string $slug, bool $isPublished, string $description)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->isPublished = $isPublished;
        $this->description = $description;

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function IsPublished(): bool
    {
        return $this->isPublished;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCategory(): array
    {
        return [$this->name, $this->slug, $this->isPublished,$this->description];

    }
}
