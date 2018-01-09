<?php

namespace MauriceBot\Webhook;

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
    public function __construct($name, array $parameters, $lifespan)
    {
        $this->set_name($name);
        $this->set_lifespan($lifespan);
        foreach ($parameters as $key => $value) {
            $this->set_parameter($key, $value);
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function set_parameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * @return string
     */
    public function get_name()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function set_name($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get_parameter($key)
    {
        if ($this->has_parameter($key)) {
            return $this->parameters[$key];
        }

        return null;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has_parameter($key)
    {
        return isset($this->parameters[$key]);
    }

    /**
     * @param string $key
     *
     * @return void
     */
    public function delete_parameter($key)
    {
        unset($this->parameters[$key]);
    }

    /**
     * @return int
     */
    public function get_lifespan()
    {
        return $this->lifespan;
    }

    /**
     * @param int $lifespan
     *
     * @return void
     */
    public function set_lifespan($lifespan)
    {
        $this->lifespan = (int)$lifespan;
    }

    /**
     * @return array
     */
    public function get_parameters()
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