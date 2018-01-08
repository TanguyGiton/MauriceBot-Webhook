<?php

use MauriceBot\Webhook\Action;

class ActionTest extends \PHPUnit\Framework\TestCase
{
    public function testPushAndPop()
    {
        $request  = new \MauriceBot\Webhook\DialogflowRequest();
        $response = new \MauriceBot\Webhook\Response();
        $model    = new \MauriceBot\Webhook\Model();
        $action   = new Action($request, $response, $model);

        $this->assertEquals(Action::class, 'MauriceBot\Webhook\Action');
    }
}
