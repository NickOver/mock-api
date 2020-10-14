<?php


namespace App\Config\Types;


class Type
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var TypeFieldsContainer
     */
    private $fields = [];

    /**
     * Type constructor.
     * @param string $name
     * @param TypeFieldsContainer $fields
     */
    public function __construct(string $name, TypeFieldsContainer $fields)
    {
        $this->name = $name;
        $this->fields = $fields;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return TypeFieldsContainer
     */
    public function getFields()
    {
        return $this->fields;
    }
}
