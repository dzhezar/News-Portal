<?php

/*
 * This file is part of the "News_Portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Category;

use App\Dto\Category;
use App\Post\PostsCollection;

/**
 * Interface of category page service that provides data for home page.
 */
interface CategoryPageServiceInterface
{
    /**
     * Gets category by provided category slug.
     *
     * @param string $slug
     *
     * @return Category
     */
    public function getCategoryBySlug(string $slug): Category;
    /**
     * Gets collection of posts for home page.
     *
     * @param Category $category
     * @return PostsCollection
     */
    public function getPosts(Category $category): PostsCollection;

}
