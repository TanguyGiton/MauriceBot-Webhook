<?php

namespace MauriceBot\Webhook;

use PHPUnit\Framework\TestCase;

class DialogflowEventTest extends TestCase
{

    public function testJsonSerialize()
    {
        $event = new DialogflowEvent('Test', [
            'param1' => 'value1',
            'param2' => 'value2',
        ]);

        $json = json_encode($event);

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString(json_encode([
            'name' => 'Test',
            'data' => [
                'param1' => 'value1',
                'param2' => 'value2',
            ]
        ]), $json);
    }
}
