<?php

namespace MauriceBot\Webhook\Dialogflow;

use MauriceBot\Webhook\ContextInterface;

class DialogflowContext implements ContextInterface
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $parameters = [];

    /**
     * @var int
     */
    private $lifespan;

    /**
     * DialogflowContext constructor.
     *
     * @param string $name
     * @param array $parameters
     * @param int $lifespan
     */
    public function __construct($name = null, array $parameters = [], $lifespan = null)
    {
        $this->setName($name);
        $this->setLifespan($lifespan);
        foreach ($parameters as $key => $value) {
            $this->setParameter($key, $value);
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getParameter($key)
    {
        if ($this->hasParameter($key)) {
            return $this->parameters[$key];
        }

        return null;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function hasParameter($key)
    {
        return isset($this->parameters[$key]);
    }

    /**
     * @param string $key
     *
     * @return void
     */
    public function deleteParameter($key)
    {
        unset($this->parameters[$key]);
    }

    /**
     * @return int
     */
    public function getLifespan()
    {
        return $this->lifespan;
    }

    /**
     * @param int $lifespan
     *
     * @return void
     */
    public function setLifespan($lifespan)
    {
        $this->lifespan = (int)$lifespan;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
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