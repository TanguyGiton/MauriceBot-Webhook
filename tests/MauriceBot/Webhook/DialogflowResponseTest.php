<?php
/**
 * Created by PhpStorm.
 * Filename : DialogflowResponseTest.php
 * User: Tanguy Giton
 * Date: 09/01/2018
 * Time: 01:21
 */

namespace MauriceBot\Webhook;

use PHPUnit\Framework\TestCase;

class DialogflowResponseTest extends TestCase
{

    public function testJsonSerialize()
    {
        $response = new DialogflowResponse();
        $response->set_text('Bonjour les amis !');
        $response->set_source('MauriceBot');
        $response->set_followup_event(new DialogflowEvent('event_name', ['param' => 'value']));
        $response->add_context_out(new DialogflowContext('context1_name', ['param' => 'value'], 5));
        $response->add_context_out(new DialogflowContext('context2_name', ['param' => 'value'], 3));

        $json = json_encode($response);

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString(json_encode([
            'speech'        => 'Bonjour les amis !',
            'displayText'   => 'Bonjour les amis !',
            'data'          => [],
            'contextOut'    => [
                [
                    'name'       => 'context1_name',
                    'lifespan'   => 5,
                    'parameters' => ['param' => 'value']
                ],
                [
                    'name'       => 'context2_name',
                    'lifespan'   => 3,
                    'parameters' => ['param' => 'value']
                ]
            ],
            'followupEvent' => [
                'name' => 'event_name',
                'data' => ['param' => 'value']
            ],
            'source'        => 'MauriceBot'
        ]), $json);
    }
}
