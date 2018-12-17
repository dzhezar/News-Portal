<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 17.12.18
 * Time: 17:42
 */

namespace App\Service\Category;


use App\Dto\Post;
use App\Post\PostsCollection;

/**
 * Fake category page service that generates test data.
 */
final class FakeCategoryService implements CategoryPageService
{
    /**
     *Sets quantity of generated posts
     */
    private const POSTS_COUNT = 6;


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
                $faker->dateTime
            );

            $dto->setImage($faker->imageUrl());

            $collection->addPost($dto);
        }
        return $collection;
    }
}