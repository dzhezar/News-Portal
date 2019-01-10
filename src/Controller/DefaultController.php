<?php

/*
 * This file is part of the "News_Portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Form\ContactForm;
use App\Service\Contacts\ContactPageService;
use App\Service\Home\HomePageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Default site controller.
 */
final class DefaultController extends AbstractController
{
    /**
     * Renders home page.
     *
     * @param HomePageService $service
     * @return Response
     */
    public function index(HomePageService $service): Response
    {
        $posts = $service->getPosts();
        $categories = $service->getCategories();


        return $this->render('default/index.html.twig', [
            'posts'=>$posts,
            'categories'=>$categories
        ]);
    }

    /**
     * Renders contacts page
     *
     * @param Request $request
     * @param ContactPageService $service
     * @return Response
     */
    public function showContacts(Request $request, ContactPageService $service, HomePageService $homePageService): Response
    {
        $form = $this->createForm(ContactForm::class);
        $form->handleRequest($request);
        $contacts = $service->getContacts()->getContacts();
        $categories = $homePageService->getCategories();


        if ($form->isSubmitted() && $form->isValid()) {
            $service->encodeForm($form->getData());
            $this->addFlash('notice', 'Success!');
        }

        return $this->render('default/contacts.html.twig', [
            'form' => $form->createView(),
            'contacts' => $contacts,
            'categories' => $categories
        ]);
    }
}
