<?php

/*
 * This file is part of the "News_Portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Exception\EntityNotFoundException;
use App\Service\Category\CategoryPageServiceInterface;
use App\Service\Home\HomePageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 *  Category page controller.
 */
class CategoryController extends AbstractController
{
    /**
     * Renders category page.
     *
     * @param string $slug
     * @param CategoryPageServiceInterface $service
     *
     * @return Response
     */
    public function show(string $slug, CategoryPageServiceInterface $service, HomePageService $home): Response
    {
        try{
            $category = $service->getCategoryBySlug($slug);
        }
        catch (EntityNotFoundException $e){
            throw $this->createNotFoundException($e->getMessage());
        }

        $posts = $service->getPosts($category);
        $categories = $home->getCategories();
        return $this->render('default/category.html.twig', [
            'categories' => $categories,
            'title' =>$category,
            'posts'=>$posts
        ]);
    }
}
