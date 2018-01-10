<?php

namespace MauriceBot\Webhook\Dialogflow;


use MauriceBot\Webhook\ResponseBuilderInterface;
use MauriceBot\Webhook\ResponseInterface;

class DialogflowResponseBuilder implements ResponseBuilderInterface
{
    /**
     * @var DialogflowResponse
     */
    private $response;

    public function __construct()
    {
        $this->response = new DialogflowResponse();
    }

    /**
     * @return ResponseInterface;
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param string $text
     *
     * @return $this
     */
    public function setText($text)
    {
        $this->response->setText($text);

        return $this;
    }

    /**
     * @param string $name
     * @param array $parameters
     * @param int $lifespan
     *
     * @return $this
     */
    public function addContextOut($name, array $parameters = [], $lifespan)
    {
        $this->response->addContextOut(new DialogflowContext($name, $parameters, $lifespan));

        return $this;
    }

    /**
     * @param string $source
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->response->setSource($source);

        return $this;
    }

    /**
     * @param string $name
     * @param array $data
     *
     * @return $this
     */
    public function setFollowupEvent($name, array $data = [])
    {
        $this->response->setFollowupEvent(new DialogflowEvent($name, $data));

        return $this;
    }
}