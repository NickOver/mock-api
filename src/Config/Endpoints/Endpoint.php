<?php


namespace App\Config\Endpoints;


use App\Config\Types\Type;

class Endpoint
{

    private $name;

    private $path;

    private $method;

    private $data;

    public function __construct(string $name, string $path, string $method)
    {
        $this->name = $name;
        $this->path = $path;
        $this->method = $method;
    }

    public function setData(Type $type)
    {
        $this->data = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function hasData(): bool
    {
        return $this->data instanceof Type;
    }

    public function getData(): Type
    {
        return $this->data;
    }
}
