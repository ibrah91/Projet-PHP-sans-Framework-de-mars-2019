<?php

namespace App\Middleware;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TrailingSlashMiddleware implements MiddlewareInterface
{


    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        //Touver l'URL
             $url=$request->getUri()->getPath();
        //Déterminer le dernier caractére de  l'URL
             $lastCharacter = substr($url,-1);
        //si le dernier caractére est un slash ("/")
             if ($lastCharacter === '/'){
                //Déterminer la nouvelle url
             $newURL = substr($url,0,-1);
        var_dump($newURL);
        //Rediriger
        $response = new Response(301,[
            'location'=>$newURL
        ]);
        return $response;
             }else{
        //Sinon on appelle le middleware suivant
        return $handler->handle($request);
             }
        var_dump($url);
         die('On est dans le TrailingSlash Middleware');
    }
}
