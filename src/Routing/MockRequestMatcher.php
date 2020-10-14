<?php


namespace App\Routing;


use App\Config\ConfigProvider;
use App\Config\Endpoints\Endpoint;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\RequestMatcherInterface;
use Symfony\Component\Routing\RequestContext;

class MockRequestMatcher implements RequestMatcherInterface
{
    /**
     * @var Router
     */
    private $matcher;

    /**
     * @var ConfigProvider
     */
    private $configProvider;

    /**
     * @var string[]
     */
    private $methodToController = [
        'GET' => 'GetController',
    ];

    public function __construct(Router $matcher, ConfigProvider $configProvider)
    {
        $this->matcher = $matcher;
        $this->configProvider = $configProvider;
    }

    public function setContext(RequestContext $context)
    {
        $this->matcher->setContext($context);
    }

    public function getContext()
    {
        return $this->matcher->getContext();
    }

    public function matchRequest(Request $request)
    {
        try {
            return $this->matcher->match($request->getPathInfo());
        } catch (ResourceNotFoundException $exception) {
            $config = $this->configProvider->getConfig();

            /** @var Endpoint $endpoint */
            foreach ($config->getAll() as $endpoint) {
                if ($endpoint->getMethod() !== $request->getMethod()) {
                    continue;
                }

                if ($endpoint->getPath() !== $request->getPathInfo()) {
                    continue;
                }



                return [
                    '_controller' => $this->getController($request->getMethod()),
                    '_data' => $endpoint
                ];
            }
        }
    }

    private function getController(string $method)
    {
        $className = sprintf('App\Controller\%sController', ucfirst(strtolower($method)));

        if (!class_exists($className)) {
            //TODO throw exception
        }
        $classWithMethod = sprintf('%s::%s', $className, 'handle');

        if (!is_callable($classWithMethod)) {
            //TODO throw exception
        }

        return $classWithMethod;
    }

}
