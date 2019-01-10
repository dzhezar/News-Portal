<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 27.12.18
 * Time: 14:41
 */

namespace App\Service\Category;


use App\Category\CategoryMapper;
use App\Dto\Category;
use App\Post\PostsCollection;
use App\Post\PostMapper;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Post\PostRepositoryInterface;


class CategoryPageService implements CategoryPageServiceInterface
{

    private $categoryRepository;
    private $postRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        PostRepositoryInterface $postRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Gets category by provided category slug.
     *
     * @param string $slug
     *
     * @return Category
     */
    public function getCategoryBySlug(string $slug): Category
    {
        $category = $this->categoryRepository->findCategoryBySlug($slug);
        $dataMapper = new CategoryMapper();
        $dto = $dataMapper->entityToDto($category);

        return $dto;
    }

    /**
     * Gets posts collection for provided category.
     *
     * @param Category $category
     *
     * @return PostsCollection
     */
    public function getPosts(Category $category): PostsCollection
    {
        $posts = $this->postRepository->findByCategory($category->getName());
        $collection = new PostsCollection();
        $dataMapper = new PostMapper();
        foreach ($posts as $post) {
            $publ = $dataMapper->entityToDto($post);
            $collection->addPost($publ);
        }
        return $collection;
    }

}