<?php
namespace App\Middleware;

use GuzzleHttp\Psr7\Response;
use Controller\Controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomeController extends Controller
{
    public function process(ServerRequestInterface $request, 
    RequestHandlerInterface $handler): ResponseInterface
    {
        return new Response(200, [], '<h1>Ma page home </h1>');
        return $this->render('home.twig');
    }
}
