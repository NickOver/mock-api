<?php


namespace App\Config\Mapper;


interface MapperInterface
{
    public function setTypes(array $types): MapperInterface;

    public function setEndpoints(array $endpoints): MapperInterface;

    public function map();
}
