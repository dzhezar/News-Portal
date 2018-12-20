<?php

/*
 * This file is part of the "News_Portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Category;

use App\Post\PostsCollection;

/**
 * Interface of category page service that provides data for home page.
 */
interface CategoryPageServiceInterface
{
    /**
     * Gets collection of posts for home page.
     *
     * @param string $type
     *
     * @return PostsCollection
     */
    public function getPosts(string $type): PostsCollection;
}
