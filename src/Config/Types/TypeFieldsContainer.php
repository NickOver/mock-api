<?php


namespace App\Config\Types;


class TypeFieldsContainer
{
    private $fields;

    public function add(TypeField $typeField)
    {
        $this->fields[$typeField->getName()] = $typeField;
    }
}
