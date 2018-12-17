<?php

namespace App\Controller;

use App\Service\Home\FakeHomeService;
use App\Service\Home\HomePageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Default site controller.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
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
    public function index(FakeHomeService $service): Response
    {
        $posts = $service->getPosts();
        //return new Response(var_dump($posts));

        return $this->render('default/index.html.twig',['posts'=>$posts]);
    }
}
