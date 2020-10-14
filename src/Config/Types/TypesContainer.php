<?php


namespace App\Config\Types;


class TypesContainer implements TypesContainerInterface
{
    /**
     * @var array<string:Type>
     */
    private $types;

    public function add(Type $type): void
    {
        if ($this->isTypeExists($type->getName())) {
            throw new \InvalidArgumentException('Type already exists');
        }

        $this->types[$type->getName()] = $type;
    }

    public function getByName(string $name): Type
    {
        return $this->types[$name];
    }

    public function isTypeExists(string $name): bool
    {
        return isset($this->types[$name]);
    }
}
