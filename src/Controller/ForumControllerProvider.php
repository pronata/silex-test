<?php

namespace ProNata\Controller;


use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;

class ForumControllerProvider implements ControllerProviderInterface
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
        // define controllers for a forum
        $forum = $app['controllers_factory'];
        $forum->get('/', function () {
            return 'Forum home page';
        });
        
        return $forum;
    }
}