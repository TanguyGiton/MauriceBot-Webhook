<?php

namespace MauriceBot\Webhook\Dialogflow;


use MauriceBot\Webhook\EventInterface;

class DialogflowEvent implements EventInterface
{
    /**
     * @var $name string
     */
    private $name;

    /**
     * @var array
     */
    private $data = [];

    public function __construct($name = null, array $data = [])
    {
        $this->setName($name);
        foreach ($data as $key => $value) {
            $this->addData($key, $value);
        }
    }

    /**
     * @param $name string
     *
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param $key string
     * @param $value mixed
     *
     * @return void
     */
    public function addData($key, $value)
    {
        $this->data[$key] = $value;
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