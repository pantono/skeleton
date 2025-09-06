<?php

namespace App\Endpoint;

use Pantono\Core\Router\Endpoint\AbstractEndpoint;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ParameterBag;
use League\Fractal\Resource\ResourceAbstract;
use League\Fractal\Resource\Item;
use Pantono\Core\Decorator\GenericArrayDecorator;
use Pantono\Email\Email;
use Pantono\Email\EmailTemplates;

class Ping extends AbstractEndpoint
{
    public function processRequest(ParameterBag $parameters): array|ResourceAbstract|Response
    {
        return new Item(['pong' => time()], new GenericArrayDecorator());
    }
}
