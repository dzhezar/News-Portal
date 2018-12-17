<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 17.12.18
 * Time: 17:39
 */

namespace App\Controller;


use App\Service\Category\FakeCategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    public function show($type, FakeCategoryService $service)
    {
        $posts = $service->getPosts();


        return $this->render('default/category.html.twig',['title' =>ucfirst($type), 'posts'=>$posts]);
    }
}