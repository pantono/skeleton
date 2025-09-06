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

class Ping extends AbstractEndpoint{
    private Email $email;
    private EmailTemplates $templates;

    public function __construct(Email $email, EmailTemplates $templates)
    {
        $this->email = $email;
        $this->templates = $templates;
    }

    public function processRequest(ParameterBag $parameters): array|ResourceAbstract|Response
    {
        $message = $this->email->createMessage();

        $message->from('test@test.com', 'Test')
            ->to('test@test.com', 'Test')
            ->subject('Test Subject')->send();
        return new Item(['pong' => time()], new GenericArrayDecorator());
    }
}
