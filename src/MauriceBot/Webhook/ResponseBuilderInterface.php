<?php

namespace MauriceBot\Webhook;


interface ResponseBuilderInterface
{
    /**
     * @return ResponseInterface;
     */
    public function getResponse();

    /**
     * @param string $text
     *
     * @return $this
     */
    public function setText($text);

    /**
     * @param string $name
     * @param array $parameters
     * @param int $lifespan
     *
     * @return $this
     */
    public function addContextOut($name, array $parameters = [], $lifespan);

    /**
     * @param string $source
     *
     * @return $this
     */
    public function setSource($source);

    /**
     * @param string $name
     * @param array $data
     *
     * @return $this
     */
    public function setFollowupEvent($name, array $data = []);
}