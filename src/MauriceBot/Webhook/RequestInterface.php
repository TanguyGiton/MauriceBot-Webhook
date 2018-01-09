<?php

namespace MauriceBot\Webhook;

interface RequestInterface
{

    /**
     * @param $json
     *
     * @return void
     */
    public function hydrate_JSON($json);

    /**
     * @return \DateTime
     */
    public function get_time();

    /**
     * @return string
     */
    public function get_action();

    /**
     * @param $key
     *
     * @return bool
     */
    public function has_parameter($key);

    /**
     * @param $key
     *
     * @return mixed|null
     */
    public function get_parameter($key);

    /**
     * @return array
     */
    public function get_parameters();

    /**
     * @param string $name
     *
     * @return ContextInterface
     */
    public function get_context($name);

    /**
     * @return array WebhookContext
     */
    public function get_contexts();

    /**
     * @param string $name
     *
     * @return bool
     */
    public function has_context($name);
}