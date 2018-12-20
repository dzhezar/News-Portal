<?php

/*
 * This file is part of the "News_Portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Service\Home\HomePageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Default site controller.
 */
final class DefaultController extends AbstractController
{
    /**
     * Renders home page.
     *
     * @param HomePageServiceInterface $service
     *
     * @return Response
     */
    public function index(HomePageServiceInterface $service): Response
    {
        $posts = $service->getPosts();

        return $this->render('default/index.html.twig', ['posts'=>$posts]);
    }
}
