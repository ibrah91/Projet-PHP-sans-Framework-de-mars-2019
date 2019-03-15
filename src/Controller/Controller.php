<?php
namespace Appli\Controller;

use GuzzleHttp\Psr7\Response;
use Generic\Renderer\TwigRenderer;
use Psr\Http\Server\MiddlewareInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
abstract class Controller implements MiddlewareInterface
{

    public function __construct(TwigRenderer $twig)
    {

        $this->twig = $twig;
    }
    
    protected function render(string $view, array $variables = []):ResponseInterface
    {
        return new Response(200, [], $this->twig->render($view));
    }
}
