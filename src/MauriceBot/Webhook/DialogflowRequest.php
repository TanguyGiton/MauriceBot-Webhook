<?php

namespace MauriceBot\Webhook;

/**
 * The request from Dialogflow
 *
 * @link       http://esiea.fr
 * @since      1.0.0
 *
 * @author    Tanguy Giton, Mamoun Sqalli, Vincent Scheffer
 */
class DialogflowRequest implements WebhookRequestInterface
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
     * @var array WebhookContext
     */
    private $contexts = [];

    /**
     * @var string action
     */
    private $action;

    public function __construct($json = null)
    {
        if (null !== $json) {
            $this->hydrate_JSON($json);
        }
    }

    /**
     * @param $json
     */
    public function hydrate_JSON($json)
    {

        $json_array = json_decode($json, 'true');

        $this->set_time(new \DateTime($json_array['timestamp']));
        $this->set_action($json_array['result']['action']);

        foreach ((array)$json_array['result']['parameters'] as $key => $value) {
            $this->set_parameter($key, $value);
        }

        foreach ((array)$json_array['result']['contexts'] as $context) {
            $this->add_context(new DialogflowContext($context['name'], $context['parameters'], $context['lifespan']));
        }
    }

    public function set_parameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    public function add_context(WebhookContextInterface $context)
    {
        $name = $context->get_name();
        if ($this->has_context($name)) {
            $this->delete_context($name);
        }
        $this->contexts[] = $context;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function has_context($name)
    {
        return $this->get_context_offset($name) !== -1;
    }

    /**
     * @param string $name
     *
     * @return int position
     */
    private function get_context_offset($name)
    {
        foreach ($this->contexts as $key => $context) {
            if ($context->get_name() === $name) {
                return $key;
            }
        }

        return -1;
    }

    public function delete_context($name)
    {
        if (($key = $this->get_context_offset($name)) !== -1) {
            unset($this->contexts[$key]);
        }
    }

    /**
     * @return string
     */
    public function get_action()
    {
        return $this->action;
    }

    /**
     * @param $action
     */
    public function set_action($action)
    {
        $this->action = $action;
    }

    /**
     * @param string $name
     *
     * @return WebhookContextInterface
     */
    public function get_context($name)
    {
        if (($key = $this->get_context_offset($name)) !== -1) {
            return $this->contexts[$key];
        }

        return null;
    }

    /**
     * @return \DateTime
     */
    public function get_time()
    {
        return $this->time;
    }

    /**
     * @param \DateTime $time
     */
    public function set_time(\DateTime $time)
    {
        $this->time = $time;
    }

    /**
     * @param $key
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
     * @param $key
     *
     * @return bool
     */
    public function has_parameter($key)
    {
        return isset($this->parameters[$key]);
    }

    /**
     * @return array WebhookContext
     */
    public function get_contexts()
    {
        return $this->contexts;
    }

    /**
     * @return array
     */
    public function get_parameters()
    {
        return $this->parameters;
    }
}