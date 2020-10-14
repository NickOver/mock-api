<?php


namespace App\Config\Reader;


use App\Config\Reader\Format\ReaderFormatInterface;

class Reader implements ReaderInterface
{

    /**
     * @var ReaderFormatInterface
     */
    private $reader;

    /**
     * Reader constructor.
     * @param ReaderFormatInterface $reader
     */
    public function __construct(ReaderFormatInterface $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @return array
     */
    public function getTypes(): array
    {
        return $this->reader->readTypes();
    }

    /**
     * @return array
     */
    public function getEndpoints(): array
    {
        return $this->reader->readEndpoints();
    }
}
