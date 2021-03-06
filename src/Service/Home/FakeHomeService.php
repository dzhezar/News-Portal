<?php

/*
 * This file is part of the "News_Portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Home;

use App\Category\CategoriesCollection;
use App\Dto\Category;
use App\Dto\Post;
use App\Post\PostsCollection;

/**
 * Fake home page service that generates test data.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class FakeHomeService implements HomePageServiceInterface
{
    private const POSTS_COUNT = 4;

    /**
     * {@inheritdoc}
     */
    public function getPosts(): PostsCollection
    {
        $faker = \Faker\Factory::create();
        $collection = new PostsCollection();

        for ($i = 0; $i < self::POSTS_COUNT; $i++) {
            $dto = new Post(
                $faker->text,
                $faker->dateTimeThisDecade,
                new Category('IT',''),
                $faker->imageUrl()
                );

            $dto->set($faker->randomElement($types = ['world','it','sport','science']));
            $dto->setImage($faker->imageUrl());

            $collection->addPost($dto);
        }

        return $collection;
    }

    /**
     * Gets collection of categories for home page.
     *
     * @return CategoriesCollection
     */
    public function getCategories(): CategoriesCollection
    {
        return new CategoriesCollection([]);
    }
}
