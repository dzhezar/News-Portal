<?php

/*
 * This file is part of the "News_Portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Contacts;

use Symfony\Component\Serializer\Encoder\CsvEncoder;

/**
 *{@inheritdoc}
 */
class ContactPageService implements ContactsPageServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function encodeForm(array $form): void
    {
        $csv = new CsvEncoder();
        $var = $csv->encode($form, 'csv');

        if (\file_exists('example.csv')) {
            $var = \ltrim(\stristr($var, \PHP_EOL));
        }
        \file_put_contents('example.csv', $var, \FILE_APPEND);
    }
}
