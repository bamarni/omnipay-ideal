<?php

namespace Bamarni\Omnipay\Ideal\Tests;

use Bamarni\Omnipay\Ideal\Gateway;
use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
        $this->gateway->initialize([
            'userId'          => '12345',
            'projectId'       => '54321',
            'projectPassword' => 'Kilimanjaro',
            'senderCountryId' => 'NL',
            'apiKey'          => 'f21f57dpm88700d916ce1c2399',
            'testMode'        => false,
        ]);
    }

    public function testFetchIssuersSuccess()
    {
        $this->setMockHttpResponse('FetchIssuersSuccess.txt');

        $response = $this->gateway->fetchIssuers()->send();

        $this->assertInstanceOf('\Bamarni\Omnipay\Ideal\Message\FetchIssuersResponse', $response);
        $this->assertTrue($response->isSuccessful());

        $expectedIssuers = [
            'ABNANL2A' => 'ABN Amro',
            'INGBNL2A' => 'ING',
        ];
        $this->assertEquals($expectedIssuers, $response->getIssuers());
    }
}
