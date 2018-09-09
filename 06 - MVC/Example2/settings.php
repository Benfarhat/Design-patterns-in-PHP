<?php
return [
    Slim\Views\Twig::class => function (ContainerInterface $c) {
        $templatesPath = __DIR__.'/views/'; //Use absolute links

        $twig = new Slim\Views\Twig($templatesPath, [
            'cache' => false
        ]);

        $twig->addExtension(new Slim\Views\TwigExtension(
            $c->get('router'),
            $c->get('request')->getUri()
        ));
        return $twig;
    }
];