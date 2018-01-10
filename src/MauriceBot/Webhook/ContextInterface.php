<?php

namespace MauriceBot\Webhook;


interface ContextInterface extends \JsonSerializable
{

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName($name);

    /**
     * @param string $key
     *
     * @return bool
     */
    public function hasParameter($key);

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getParameter($key);

    /**
     * @return array
     */
    public function getParameters();

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function setParameter($key, $value);

    /**
     * @param string $key
     *
     * @return void
     */
    public function deleteParameter($key);

    /**
     * @return int
     */
    public function getLifespan();

    /**
     * @param int $lifespan
     *
     * @return void
     */
    public function setLifespan($lifespan);
}