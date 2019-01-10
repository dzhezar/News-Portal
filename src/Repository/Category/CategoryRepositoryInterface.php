<?php

namespace App\Repository\Category;

/**
 * @method findCategoryBySlug(string $slug)
 */
interface CategoryRepositoryInterface
{
    public function findAllIsPublished();
}
