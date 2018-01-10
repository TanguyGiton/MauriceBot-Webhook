<?php

namespace MauriceBot\Webhook;


interface ActionInterface
{
    /**
     * @param RequestInterface $request
     * @param ResponseBuilderInterface $response_builder
     *
     * @return Error|ResponseInterface
     */
    public function run(RequestInterface $request, ResponseBuilderInterface $response_builder);

    /**
     * @return string the action name
     */
    public function getName();
}