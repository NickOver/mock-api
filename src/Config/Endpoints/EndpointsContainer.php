<?php


namespace App\Config\Endpoints;


class EndpointsContainer
{

    private $endpoints;

    public function add(Endpoint $endpoint)
    {
        $this->endpoints[$endpoint->getName()] = $endpoint;
    }

    /**
     * @return array[Endpoint]
     */
    public function getAll(): array
    {
        return $this->endpoints;
    }

    //TODO add getByRequestMethod method
}
