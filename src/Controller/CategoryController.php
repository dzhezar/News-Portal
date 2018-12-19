<?php

/*
 * This file is part of the "News-portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Service\Category\CategoryPageServiceInterface;
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
     * @param $type
     * @param CategoryPageServiceInterface $service
     *
     * @return Response
     */
    public function show($type, CategoryPageServiceInterface $service): Response
    {
        $posts = $service->getPosts(\ucfirst($type));


        return $this->render('default/category.html.twig', ['title' => \ucfirst($type), 'posts'=>$posts]);
    }
}
