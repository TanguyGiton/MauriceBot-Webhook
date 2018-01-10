<?php

namespace MauriceBot\Webhook\Dialogflow;

use MauriceBot\Webhook\ContextInterface;
use MauriceBot\Webhook\EventInterface;
use MauriceBot\Webhook\ResponseInterface;

/**
 * The response to Dialogflow
 *
 * @link       http://esiea.fr
 * @since      1.0.0
 *
 * @author    Tanguy Giton, Mamoun Sqalli, Vincent Scheffer
 */
class DialogflowResponse implements ResponseInterface
{

    /**
     * @var string $speech
     */
    private $speech;

    /**
     * @var string $displayText
     */
    private $displayText;

    /**
     * @var array $data
     */
    //private $data;

    /**
     * @var array $contextOut
     */
    private $contextOut = [];

    /**
     * @var string $source
     */
    private $source;

    /**
     * @var EventInterface $followupEvent
     */
    private $followupEvent;

    public function setText($text)
    {
        $this->speech        = $text;
        $this->displayText   = $text;
    }

    /**
     * @return string
     */
    public function getSpeech()
    {
        return $this->speech;
    }

    /**
     * @return string
     */
    public function getDisplayText()
    {
        return $this->displayText;
    }

    /**
     * @return array
     */
    public function getContextsOut()
    {
        return $this->contextOut;
    }

    public function addContextOut(ContextInterface $context)
    {
        $this->contextOut[] = $context;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return EventInterface
     */
    public function getFollowupEvent()
    {
        return $this->followupEvent;
    }

    public function setFollowupEvent(EventInterface $event)
    {
        $this->followupEvent = $event;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}