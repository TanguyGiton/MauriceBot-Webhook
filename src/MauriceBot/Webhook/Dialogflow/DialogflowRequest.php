<?php

namespace MauriceBot\Webhook\Dialogflow;

use MauriceBot\Webhook\ContextInterface;
use MauriceBot\Webhook\RequestInterface;

/**
 * The request from Dialogflow
 *
 * @link       http://esiea.fr
 * @since      1.0.0
 *
 * @author    Tanguy Giton, Mamoun Sqalli, Vincent Scheffer
 */
class DialogflowRequest implements RequestInterface
{
    /**
     * @var \DateTime
     */
    private $time;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var ContextInterface[]
     */
    private $contexts = [];

    /**
     * @var string action
     */
    private $action;

    public function __construct($json = null)
    {
        if (null !== $json) {
            $this->hydrateJSON($json);
        }
    }

    /**
     * @param $json
     */
    public function hydrateJSON($json)
    {

        $json_array = json_decode($json, 'true');

        $this->setTime(new \DateTime($json_array['timestamp']));
        $this->setAction($json_array['result']['action']);

        foreach ((array)$json_array['result']['parameters'] as $key => $value) {
            $this->setParameter($key, $value);
        }

        foreach ((array)$json_array['result']['contexts'] as $context) {
            $this->addContext(new DialogflowContext($context['name'], $context['parameters'], $context['lifespan']));
        }
    }

    public function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    public function addContext(ContextInterface $context)
    {
        $name = $context->getName();
        if ($this->hasContext($name)) {
            $this->deleteContext($name);
        }
        $this->contexts[] = $context;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasContext($name)
    {
        return $this->getContextOffset($name) !== -1;
    }

    /**
     * @param string $name
     *
     * @return int position
     */
    private function getContextOffset($name)
    {
        foreach ($this->contexts as $key => $context) {
            if ($context->getName() === $name) {
                return $key;
            }
        }

        return -1;
    }

    public function deleteContext($name)
    {
        if (($key = $this->getContextOffset($name)) !== -1) {
            unset($this->contexts[$key]);
        }
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @param string $name
     *
     * @return ContextInterface
     */
    public function getContext($name)
    {
        if (($key = $this->getContextOffset($name)) !== -1) {
            return $this->contexts[$key];
        }

        return null;
    }

    /**
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param \DateTime $time
     */
    public function setTime(\DateTime $time)
    {
        $this->time = $time;
    }

    /**
     * @param $key
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
     * @param $key
     *
     * @return bool
     */
    public function hasParameter($key)
    {
        return isset($this->parameters[$key]);
    }

    /**
     * @return ContextInterface[]
     */
    public function getContexts()
    {
        return $this->contexts;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}