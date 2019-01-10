<?php

/*
 * This file is part of the "News_Portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Home;

use App\Category\CategoriesCollection;
use App\Post\PostsCollection;

/**
 * Interface of home page service that provides data for home page.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
interface HomePageServiceInterface
{
    /**
     * Gets collection of posts for home page.
     *
     * @return PostsCollection
     */
    public function getPosts(): PostsCollection;

    /**
     * Gets collection of categories for home page.
     *
     * @return CategoriesCollection
     */
    public function getCategories(): CategoriesCollection;
}
