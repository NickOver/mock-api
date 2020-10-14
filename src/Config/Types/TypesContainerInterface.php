<?php


namespace App\Config\Types;


interface TypesContainerInterface
{
    public function add(Type $type): void;

    public function getByName(string $name): Type;
}
