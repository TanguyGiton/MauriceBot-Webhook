<?php

use MauriceBot\Webhook\Action;

class ActionTest extends \PHPUnit\Framework\TestCase
{
    public function testPushAndPop()
    {
        $request  = new \MauriceBot\Webhook\DialogflowRequest('{
  "id": "4ca1089c-aa12-4cf1-b75c-12ac6ea69d93",
  "timestamp": "2017-12-21T10:54:35.026Z",
  "lang": "fr",
  "result": {
    "source": "agent",
    "resolvedQuery": "2a",
    "action": "prix",h
    "actionIncomplete": false,
    "parameters": {
      "admission-annee": "2ème année"
    },
    "contexts": [
      {
        "name": "prix-followup",
        "parameters": {
          "admission-annee": "2ème année",
          "admission-annee.original": "2a"
        },
        "lifespan": 2
      }
    ],
    "metadata": {
      "intentId": "6e888fd8-904e-4693-8659-5dd6333d0c54",
      "webhookUsed": "true",
      "webhookForSlotFillingUsed": "false",
      "webhookResponseTime": 3413,
      "intentName": "prix"
    },
    "fulfillment": {
      "speech": "",
      "messages": [
        {
          "type": 0,
          "speech": ""
        }
      ]
    },
    "score": 1
  }
}');
        $response = new \MauriceBot\Webhook\Response();
        $model    = new \MauriceBot\Webhook\Model();
        $action   = new Action($request, $response, $model);

        $this->assertEquals(Action::class, 'MauriceBot\Webhook\Action');
    }
}
