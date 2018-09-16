<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Tam.php";

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    session_start();
    if (empty($_SESSION['tam'])) {
        $_SESSION['tam'] = array();
    }

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('tam.html.twig');
    });

    $app->post('/new_tam', function() use ($app) {
        $new_tam = new Tam($_POST['tam']);
        $new_tam->save();

        return $app['twig']->render('tam.html.twig', array('tam' => $new_tam));
    });

    $app->post('/feed', function() use ($app) {
        $tam = ($_SESSION['tam']);
        $tam->setFood(1);

        return $app['twig']->render('tam.html.twig', array('tam' => $tam));
    });

    $app->post('/play', function() use ($app) {
        $tam = ($_SESSION['tam']);
        $tam->setAttention(1);

        return $app['twig']->render('tam.html.twig', array('tam' => $tam));
    });

    $app->post('/rest', function() use ($app) {
        $tam = ($_SESSION['tam']);
        $tam->setRest(1);

        return $app['twig']->render('tam.html.twig', array('tam' => $tam));
    });

    $app->post('/time_elapsed', function() use ($app) {
        $tam = ($_SESSION['tam']);
        $tam->timeElapsed((array_key_exists(5, $_POST)) ? 5 : 1);

        return $app['twig']->render('tam.html.twig', array('tam' => $tam));
    });


    return $app;