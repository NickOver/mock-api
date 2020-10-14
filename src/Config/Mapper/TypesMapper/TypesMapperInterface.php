<?php


namespace App\Config\Mapper\TypesMapper;


use App\Config\Types\Type;
use App\Config\Types\TypesContainerInterface;

interface TypesMapperInterface
{
    static public function mapTypes(array $types): TypesContainerInterface;

    static public function mapType(string $name, array $fields): Type;
}
