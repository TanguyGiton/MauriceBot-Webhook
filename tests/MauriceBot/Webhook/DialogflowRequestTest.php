<?php

namespace MauriceBot\Webhook;

use DateTime;
use PHPUnit\Framework\TestCase;

class DialogflowRequestTest extends TestCase
{
    protected $json;

    public function testConstructor()
    {
        $request = new DialogflowRequest($this->json);

        $this->assertEquals('prix', $request->get_action());
        $this->assertInstanceOf(DateTime::class, $request->get_time());
        $this->assertEquals(new DateTime('2017-12-21T10:54:35.026Z'), $request->get_time());
        $this->assertArrayHasKey('admission-annee', $request->get_parameters());

    }

    protected function setUp()
    {
        $this->json = file_get_contents(__DIR__ . '/../../resources/dialogflow-request-sample.json');
    }
}
