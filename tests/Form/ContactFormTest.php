<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 10.01.19
 * Time: 18:31
 */

namespace App\Tests\Form;


use App\Form\ContactForm;
use Symfony\Component\Form\Test\TypeTestCase;

class ContactFormTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData =[
            'Name' => 'name',
            'Email' => 'email@email.com',
            'Text' => 'text'
        ];

        $form = $this->factory->create(ContactForm::class);

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());

        $view = $form->createView();

        $children = $view->children;

        foreach (array_keys($formData) as $key){
            $this->assertArrayHasKey($key, $children);
        }
    }
}