<?php

/*
 * This file is part of the "News_Portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Category;

use App\Dto\Post;
use App\Post\PostsCollection;

/**
 * Fake category page service that generates test data.
 */
final class FakeCategoryService implements CategoryPageServiceInterface
{
    /**
     *Sets quantity of generated posts
     */
    private const POSTS_COUNT = 6;

    /**
     * {@inheritdoc}
     */
    public function getPosts($type = null): PostsCollection
    {
        $faker = \Faker\Factory::create();
        $collection = new PostsCollection();

        for ($i = 0; $i < self::POSTS_COUNT; $i++) {
            $dto = new Post(
                $faker->text,
                $faker->dateTime
            );
            $dto->setType($faker->randomElement($types = ['World','It','Sport','Science']));
            $dto->setImage($faker->imageUrl());

            if ($dto->getType() == $type || null == $type) {
                $collection->addPost($dto);
            }
        }

        return $collection;
    }
}
