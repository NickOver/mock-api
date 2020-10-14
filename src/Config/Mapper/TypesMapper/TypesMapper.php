<?php


namespace App\Config\Mapper\TypesMapper;


use App\Config\Types\Type;
use App\Config\Types\TypeField;
use App\Config\Types\TypeFieldsContainer;
use App\Config\Types\TypesContainer;
use App\Config\Types\TypesContainerInterface;

class TypesMapper implements TypesMapperInterface
{

    static public function mapTypes(array $types): TypesContainerInterface
    {
        $typesContainer = new TypesContainer();

        foreach ($types as $name => $fields) {
            $typesContainer->add(self::mapType($name, $fields));
        }

        return $typesContainer;
    }

    static public function mapType(string $name, array $fields): Type
    {
        $fieldsContainer = self::mapFields($fields);
        return new Type($name, $fieldsContainer);
    }

    static private function mapFields(array $fields): TypeFieldsContainer
    {
        $fieldsContainer = new TypeFieldsContainer();

        foreach ($fields as $fieldName => $fieldData) {
            $field = new TypeField($fieldName);
            $fieldsContainer->add($field);
        }

        return $fieldsContainer;
    }
}
