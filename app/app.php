<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/User.php";
    require_once __DIR__."/../src/Club.php";

    $server = 'mysql:host=localhost:8889;dbname=club';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    $app->regiser(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use($app){
        return app['twig']->render('index.html.twig');
    });

    return $app;

?>
