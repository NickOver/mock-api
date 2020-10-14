<?php


namespace App\Config\Reader\Format;


use App\Config\Reader\ReaderInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Yaml\Yaml;

class YamlReader implements ReaderFormatInterface
{
    /**
     * @var KernelInterface
     */
    private $kernel;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * YamlReader constructor.
     * @param KernelInterface $kernel
     * @param Filesystem $filesystem
     */
    public function __construct(KernelInterface $kernel, Filesystem $filesystem)
    {
        $this->kernel = $kernel;
        $this->filesystem = $filesystem;
    }

    /**
     * @return array
     */
    public function readTypes(): array
    {
        if ($this->filesystem->exists($this->kernel->getProjectDir() . '/config/types.yaml')) {
            return Yaml::parseFile($this->kernel->getProjectDir() . '/config/types.yaml');
        }

        return [];
    }

    /**
     * @return array
     */
    public function readEndpoints(): array
    {
        if ($this->filesystem->exists($this->kernel->getProjectDir() . '/config/endpoints.yaml')) {
            return Yaml::parseFile($this->kernel->getProjectDir() . '/config/endpoints.yaml');
        }

        return [];
    }
}
