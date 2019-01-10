<?php

/*
 * This file is part of the "News_Portal" package.
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Contacts;

use App\Dto\Contacts;

/**
 * Interface of contact page service that provides data for csv file.
 */
interface ContactsPageServiceInterface
{
    /**
     * Encoding data to csv file algorithm
     *
     * @param array $form
     */
    public function encodeForm(array $form): void ;

    /**
     * Get contacts info from database
     *
     * @return Contacts
     */
    public function getContacts(): Contacts;
}

