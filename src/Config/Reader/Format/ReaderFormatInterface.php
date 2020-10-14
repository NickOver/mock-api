<?php


namespace App\Config\Reader\Format;


interface ReaderFormatInterface
{
    public function readTypes(): array;

    public function readEndpoints(): array;
}
