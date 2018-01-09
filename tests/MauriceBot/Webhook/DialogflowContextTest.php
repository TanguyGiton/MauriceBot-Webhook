<?php

namespace MauriceBot\Webhook;

use PHPUnit\Framework\TestCase;

class DialogflowContextTest extends TestCase
{

    public function testJsonSerialize()
    {
        $context = new DialogflowContext('Test', [
            'param1' => 'string',
            'param2' => true,
            'param3' => 5,
        ], 5);

        $json = json_encode($context);

        $this->assertJson($json);
        $this->assertJsonStringEqualsJsonString(json_encode([
            'name'       => 'Test',
            'parameters' => [
                'param1' => 'string',
                'param2' => true,
                'param3' => 5,
            ],
            'lifespan'   => 5
        ]), $json);
    }
}
