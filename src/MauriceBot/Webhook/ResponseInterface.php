<?php

namespace MauriceBot\Webhook;


interface ResponseInterface extends \JsonSerializable
{
    /**
     * @param $text string
     *
     * @return void
     */
    public function setText($text);

    /**
     * @param ContextInterface $context
     *
     * @return void
     */
    public function addContextOut(ContextInterface $context);

    /**
     * @param EventInterface $event
     *
     * @return void
     */
    public function setFollowupEvent(EventInterface $event);

    /**
     * @param $source string
     *
     * @return void
     */
    public function setSource($source);
}