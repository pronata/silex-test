<?php

namespace ProNata\Controller;


use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;

class BlogControllerProvider implements ControllerProviderInterface
{

    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
        $blogControllers = $app['controllers_factory']; //  is a factory that returns a new instance of ControllerCollection when used.

        $blogControllers->get('/', function(Application $app) {
            return "Hello!";
        });

        return $blogControllers;
    }
}