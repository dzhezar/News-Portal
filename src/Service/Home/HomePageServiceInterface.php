<?php

namespace App\Service\Home;

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
}
