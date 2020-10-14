<?php


namespace App\Config\Mapper\EndpointsMapper;


use App\Config\Endpoints\Endpoint;
use App\Config\Endpoints\EndpointsContainer;
use App\Config\Mapper\TypesMapper\TypesMapper;
use App\Config\Types\TypesContainerInterface;

class EndpointsMapper implements EndpointsMapperInterface
{
    private $mappedTypes;

    public function setMappedTypes(TypesContainerInterface $types): EndpointsMapperInterface
    {
        $this->mappedTypes = $types;
        return $this;
    }

    public function mapEndpoints(array $endpoints): EndpointsContainer
    {
        $endpointsContainer = new EndpointsContainer();

        foreach ($endpoints as $name => $fields) {
            $endpoint = new Endpoint($name, $fields['path'], $fields['method']);

            if (isset($fields['data'])) {
                $endpoint->setData($this->processData($fields['data']));
            }

            $endpointsContainer->add($endpoint);
        }

        return $endpointsContainer;
    }

    private function processData($data) {
        if (is_string($data)) {
            if ($this->mappedTypes->isTypeExists($data)) {
                return $this->mappedTypes->getByName($data);
            }

            //TODO throw exception
        }

        return TypesMapper::mapType('', $data);
    }
}
