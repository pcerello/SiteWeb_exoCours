<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index()
    {
        return $this->render('default/index.html.twig');
    }

    #[Route('/hello/{name}', name: 'hello', defaults: ['name' => ""])]
    public function hello(string $name)
    {
        return $this->render('default/hello.html.twig',['name' => $name]);
    }
}
