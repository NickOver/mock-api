<?php


namespace App\Config\Mapper\EndpointsMapper;


use App\Config\Endpoints\EndpointsContainer;
use App\Config\Types\TypesContainerInterface;

interface EndpointsMapperInterface
{
    public function setMappedTypes(TypesContainerInterface $types): EndpointsMapperInterface;

    public function mapEndpoints(array $endpoints): EndpointsContainer;
}
