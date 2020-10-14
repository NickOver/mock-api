<?php


namespace App\Config\Reader;


interface ReaderInterface
{
    public function getTypes(): array;

    public function getEndpoints(): array;
}
