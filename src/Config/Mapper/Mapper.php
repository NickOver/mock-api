<?php


namespace App\Config\Mapper;


use App\Config\Endpoints\Endpoint;
use App\Config\Endpoints\EndpointsContainer;
use App\Config\Mapper\EndpointsMapper\EndpointsMapperInterface;
use App\Config\Mapper\TypesMapper\TypesMapper;
use App\Config\Types\TypeField;
use App\Config\Types\TypeFieldsContainer;
use App\Config\Types\TypesContainer;
use App\Config\Types\Type;

class Mapper implements MapperInterface
{
    /**
     * @var array
     */
    private $types;

    /**
     * @var TypesContainer
     */
    private $mappedTypes;

    /**
     * @var array
     */
    private $endpoints;

    /**
     * @var EndpointsContainer
     */
    private $mappedEndpoints;

    /**
     * @var EndpointsMapperInterface
     */
    private $endpointsMapper;

    public function __construct(EndpointsMapperInterface $endpointsMapper)
    {
        $this->endpointsMapper = $endpointsMapper;
    }

    public function setTypes(array $types): MapperInterface
    {
        $this->types = $types;
        return $this;
    }

    public function setEndpoints(array $endpoints): MapperInterface
    {
        $this->endpoints = $endpoints;
        return $this;
    }

    public function map()
    {
        $this->mappedTypes = TypesMapper::mapTypes($this->types);
        $this->mappedEndpoints = $this->endpointsMapper
            ->setMappedTypes($this->mappedTypes)
            ->mapEndpoints($this->endpoints);

        return $this->mappedEndpoints;
    }
}
