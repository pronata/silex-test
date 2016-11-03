<?php

use ProNata\Controller\BlogControllerProvider;
use ProNata\Controller\ForumControllerProvider;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app->register(new \Silex\Provider\FormServiceProvider());
$app->register(new \Silex\Provider\ValidatorServiceProvider());
$app->register(new \Silex\Provider\CsrfServiceProvider());
$app['debug'] = true;

// define "global" controllers
$app->get('/', function () {
    return 'Main home page';
});
$app->get('/hello/{name}', function($name) use($app) {
    return 'Hello '.$app->escape($name);
});

$app->mount('/blog', new BlogControllerProvider());
$app->mount('/forum', new ForumControllerProvider());

//$blog->before($mustBeLogged);
// define controllers for a admin
$app->mount('/admin', function ($admin) {
    // recursively mount
    $admin->mount('/blog', function ($user) {
        $user->get('/', function () {
            return 'Admin Blog home page';
        });
    });
});


$app->run();