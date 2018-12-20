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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    public function showContacts(Request $request, ContactPageService $service): Response
    {
        $form = $this->createForm(ContactForm::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $service->encodeForm($form->getData());
            $this->addFlash('notice', 'Success!');
        }

        return $this->render('default/contacts.html.twig', ['form'=>$form->createView()]);
    }
}
