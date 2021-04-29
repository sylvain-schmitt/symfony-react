<?php


namespace App\Controller\Api;


use Symfony\Component\HttpFoundation\Response;

class EmptyController
{
    public function __invoke(): Response
    {
        return new Response();
    }
}