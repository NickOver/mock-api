<?php


namespace App\Config;


use App\Config\Endpoints\EndpointsContainer;
use App\Config\Mapper\MapperInterface;
use App\Config\Reader\ReaderInterface;

class ConfigProvider
{

    /**
     * @var ReaderInterface
     */
    private $reader;

    /**
     * @var MapperInterface
     */
    private $mapper;

    public function __construct(ReaderInterface $reader, MapperInterface $mapper)
    {
        $this->reader = $reader;
        $this->mapper = $mapper;
    }

    public function getConfig(): EndpointsContainer
    {
        return $this->mapper
            ->setTypes($this->getTypes())
            ->setEndpoints($this->getEndpoints())
            ->map();
    }

    private function getTypes(): array
    {
        return $this->reader->getTypes();
    }

    private function getEndpoints(): array
    {
        return $this->reader->getEndpoints();
    }
}
