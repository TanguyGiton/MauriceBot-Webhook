<?php

namespace MauriceBot\Webhook;

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
    private $data = [];

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

    public function set_text($text)
    {
        $this->speech        = $text;
        $this->displayText   = $text;
    }

    /**
     * @return string
     */
    public function get_speech()
    {
        return $this->speech;
    }

    /**
     * @return string
     */
    public function get_display_text()
    {
        return $this->displayText;
    }

    /**
     * @return array
     */
    public function get_contexts_out()
    {
        return $this->contextOut;
    }

    public function add_context_out(ContextInterface $context)
    {
        $this->contextOut[] = $context;
    }

    /**
     * @return string
     */
    public function get_source()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function set_source($source)
    {
        $this->source = $source;
    }

    /**
     * @return EventInterface
     */
    public function get_followup_event()
    {
        return $this->followupEvent;
    }

    public function set_followup_event(EventInterface $event)
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