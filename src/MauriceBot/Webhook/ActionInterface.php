<?php

namespace MauriceBot\Webhook;


interface ActionInterface
{
    /**
     * @param RequestInterface $request
     * @param ResponseBuilderInterface $response_builder
     *
     * @return ResponseInterface
     */
    public function run(RequestInterface $request, ResponseBuilderInterface $response_builder);

    /**
     * @return string the action name
     */
    public function getName();
}