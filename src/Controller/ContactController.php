<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 20.12.18
 * Time: 14:53
 */
namespace App\Controller;

use App\Form\ContactForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\CsvEncoder;

class ContactController extends AbstractController
{
    public function showContacts(Request $request): Response
    {
        $form = $this->createForm(ContactForm::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $csv = new CsvEncoder();

            $var = $csv->encode($form->getData(), 'csv');

            if (\file_exists('example.csv')) {
                $var = \ltrim(\stristr($var, \PHP_EOL));
            }
            \file_put_contents('example.csv', $var, \FILE_APPEND); ?>
            <script>
                alert("Successful sending");
            </script>
            <?php
        }

        return $this->render('default/contacts.html.twig', ['form'=>$form->createView()]);
    }
}
