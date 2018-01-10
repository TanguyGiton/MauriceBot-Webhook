<?php

namespace MauriceBot\Webhook;


interface EventInterface extends \JsonSerializable
{

    /**
     * @param $name string
     *
     * @return void
     */
    public function setName($name);

    /**
     * @param $key string
     * @param $value mixed
     *
     * @return void
     */
    public function addData($key, $value);
}