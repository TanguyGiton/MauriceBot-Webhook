<?php

namespace MauriceBot\Webhook;


interface EventInterface extends \JsonSerializable
{

    /**
     * @param $name string
     *
     * @return void
     */
    public function set_name($name);

    /**
     * @param $key string
     * @param $value mixed
     *
     * @return void
     */
    public function add_data($key, $value);
}