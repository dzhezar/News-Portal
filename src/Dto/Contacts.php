<?php
/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 28.12.18
 * Time: 20:45
 */

namespace App\Dto;


class Contacts
{
    private $address;
    private $phone;
    private $email;

    public function __construct(string $address, string $phone, string $email)
    {
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getContacts(): array
    {
        return [$this->address,$this->phone, $this->email];
    }
}