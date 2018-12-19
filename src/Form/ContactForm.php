<?php

/*
 * This file is part of the "News-portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Contact Form class
 */
class ContactForm extends AbstractType
{
    /**
     * Creates form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                'attr' => [
                    'placeholder' => 'Name',
                    'class' => 'form-control',
                ],
            ])
            ->add('Email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'E-mail',
                    'class' => 'form-control',
                ],
            ])
            ->add('Text', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Here you can text your wishes',
                    'class' => 'form-control',
                ],
            ])
            ->add('Submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ])
            ->getForm();
    }
}
