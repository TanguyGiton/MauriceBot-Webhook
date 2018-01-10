<?php

namespace MauriceBot\Webhook\Action;


use MauriceBot\Webhook\ActionInterface;
use MauriceBot\Webhook\RequestInterface;
use MauriceBot\Webhook\ResponseBuilderInterface;
use MauriceBot\Webhook\ResponseInterface;

class AdmissionAction implements ActionInterface
{

    /**
     * @param RequestInterface $request
     * @param ResponseBuilderInterface $response_builder
     *
     * @return ResponseInterface
     */
    public function run(RequestInterface $request, ResponseBuilderInterface $response_builder)
    {
        $admission = $request->getParameter('admission');

        if ($admission === 'BacS') {
            $text = 'Salut BacS';
        } else {
            $text = 'Je t\'aime pas';
        }

        return $response_builder
            ->setText($text)
            ->setFollowupEvent('machin', [])
            ->getResponse();
    }

    /**
     * @return string the action name
     */
    public function getName()
    {
        return 'admission.action';
    }
}