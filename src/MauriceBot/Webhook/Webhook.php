<?php

namespace MauriceBot\Webhook;


class Webhook
{
    /**
     * @var ActionInterface[]
     */
    protected $actions = [];

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ResponseBuilderInterface
     */
    protected $response_builder;

    /**
     * @var \JsonSerializable
     */
    protected $response;

    /**
     * Webhook constructor.
     *
     * @param RequestInterface $request
     * @param ResponseBuilderInterface $response_builder
     */
    public function __construct(RequestInterface $request, ResponseBuilderInterface $response_builder)
    {
        $this->request          = $request;
        $this->response_builder = $response_builder;
    }

    /**
     * Exécute la bonne action suivant la Request
     */
    public function run()
    {
        $action_name = $this->request->getAction();

        $action = $this->getAction($action_name);

        if (null !== $action) {
            $this->response = $action->run($this->request, $this->response_builder);
        } else {
            $this->response = new Error(Error::CODE_BAD_REQUEST, 'This action doesn\'t exist');
        }

        return $this;
    }

    /**
     * @param $name
     *
     * @return ActionInterface|null
     */
    private function getAction($name)
    {
        foreach ($this->actions as $action) {
            if ($action->getName() === $name) {
                return $action;
            }
        }

        return null;
    }

    public function getResponse()
    {
        if (null === $this->response) {
            $this->run();
        }
        return $this->response;
    }

    /**
     * Ajoute une action à la liste du webhook
     *
     * @param ActionInterface $action
     *
     * @return Webhook
     */
    public function registerAction(ActionInterface $action)
    {
        $this->actions[] = $action;

        return $this;
    }
}