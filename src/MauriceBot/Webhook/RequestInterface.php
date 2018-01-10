<?php

namespace MauriceBot\Webhook;

interface RequestInterface
{

    /**
     * @param $json
     *
     * @return void
     */
    public function hydrateJSON($json);

    /**
     * @return \DateTime
     */
    public function getTime();

    /**
     * @return string
     */
    public function getAction();

    /**
     * @param $key
     *
     * @return bool
     */
    public function hasParameter($key);

    /**
     * @param $key
     *
     * @return mixed|null
     */
    public function getParameter($key);

    /**
     * @return array
     */
    public function getParameters();

    /**
     * @param string $name
     *
     * @return ContextInterface
     */
    public function getContext($name);

    /**
     * @return array WebhookContext
     */
    public function getContexts();

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasContext($name);
}