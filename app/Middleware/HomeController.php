<?php
namespace App\Middleware;

use GuzzleHttp\Psr7\Response;
use Generic\Database\\Connection;
use Generic\Renderer\TwigRenderer;
use Controller\Controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomeController extends Controller
{

public function __construct(TwigRenderer $twig,Connection $connection){

parent::__construct($twig);

$this->connection = $Connection;

}



    public function process(ServerRequestInterface $request, 
    RequestHandlerInterface $handler): ResponseInterface
    {
        $products = $this ->connection ->query("SELECT * FROM product");
        
        return $this->render('home.twig'
        [,'products => $products']);


    
}
}