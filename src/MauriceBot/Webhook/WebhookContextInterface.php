<?php

namespace MauriceBot\Webhook;


interface WebhookContextInterface
{

    /**
     * @return string
     */
    public function get_name();

    /**
     * @param string $name
     *
     * @return void
     */
    public function set_name($name);

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has_parameter($key);

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get_parameter($key);

    /**
     * @return array
     */
    public function get_parameters();

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function set_parameter($key, $value);

    /**
     * @param string $key
     *
     * @return void
     */
    public function delete_parameter($key);

    /**
     * @return int
     */
    public function get_lifespan();

    /**
     * @param int $lifespan
     *
     * @return void
     */
    public function set_lifespan($lifespan);
}