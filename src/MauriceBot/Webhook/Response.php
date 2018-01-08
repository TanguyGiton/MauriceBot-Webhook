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
class Response
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
    private $data;

    /**
     * @var array $contextOut
     */
    private $contextOut;

    /**
     * @var string $source
     */
    private $source;

    /**
     * @var array $followupEvent
     */
    private $followupEvent;

    public function set_text($text)
    {
        $this->speech        = $text;
        $this->displayText   = $text;
        $this->data          = [];
        $this->contextOut    = [];
        $this->source        = 'ESIEA';
        $this->followupEvent = [];
    }

    /**
     * @return string
     */
    public function get_speech()
    {
        return $this->speech;
    }

    /**
     * @param string $speech
     */
    public function set_speech($speech)
    {
        $this->speech = $speech;
    }

    /**
     * @return string
     */
    public function get_display_text()
    {
        return $this->displayText;
    }

    /**
     * @param string $displayText
     */
    public function set_display_text($displayText)
    {
        $this->displayText = $displayText;
    }

    /**
     * @return array
     */
    public function get_data()
    {
        return $this->data;
    }

    public function set_data(array $data)
    {
        $this->data = $data;
    }

    public function update_data($key, $value)
    {
        $this->data[$key] = $value;

        return true;
    }

    public function add_data($key, $value)
    {
        if ( ! array_key_exists($key, $this->data)) {
            $this->data[$key] = $value;

            return true;
        }

        return false;
    }

    public function delete_data($key)
    {
        if (array_key_exists($key, $this->data)) {
            unset($this->data[$key]);

            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public function get_context_out()
    {
        return $this->contextOut;
    }

    public function add_context_out($name, $lifespan, array $parameters)
    {
        $context['name']       = $name;
        $context['lifespan']   = $lifespan;
        $context['parameters'] = $parameters;

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
     * @return array
     */
    public function get_followup_event()
    {
        return $this->followupEvent;
    }

    public function set_followup_event($event_name, array $event_data)
    {
        $this->followupEvent['name'] = $event_name;
        $this->followupEvent['data'] = $event_data;
    }
}