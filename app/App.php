<?php
namespace App;

use GuzzleHttp\Psr7\Response;
use App\Middleware\HomeController;
use Psr\Http\Message\ResponseInterface;
use App\Middleware\TrailingSlashMiddleware;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class App implements RequestHandlerInterface
{
private $compteurMiddleware;

public function __construct(){

$this->compteurMiddleware = 0 ;  
  
}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        //Appel du premier Middleware
        $trailingSlash = new TrailingSlashMiddleware();
        return $trailingSlash->process($request,$this);
        
        
        return $response ;
    }
}
