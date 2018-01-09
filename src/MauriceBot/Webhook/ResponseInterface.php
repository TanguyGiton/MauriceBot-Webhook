<?php

namespace MauriceBot\Webhook;


interface ResponseInterface extends \JsonSerializable
{
    /**
     * @param $text string
     *
     * @return void
     */
    public function set_text($text);

    /**
     * @param ContextInterface $context
     *
     * @return void
     */
    public function add_context_out(ContextInterface $context);

    /**
     * @param EventInterface $event
     *
     * @return void
     */
    public function set_followup_event(EventInterface $event);

    /**
     * @param $source string
     *
     * @return void
     */
    public function set_source($source);
}