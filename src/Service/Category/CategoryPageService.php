<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 17.12.18
 * Time: 17:42
 */

namespace App\Service\Category;


use App\Post\PostsCollection;

/**
* Interface of category page service that provides data for home page.
*/
interface CategoryPageService
{
    /**
     * Gets collection of posts for home page.
     *
     * @return PostsCollection
     */
    public function getPosts():PostsCollection;

}