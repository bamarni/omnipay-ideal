<?php

namespace Bamarni\Omnipay\Ideal\Tests\Message;

use Bamarni\Omnipay\Ideal\Message\PurchaseRequest;
use Omnipay\Tests\TestCase;

class PurchaseRequestTest extends TestCase
{
    public function testGetData()
    {
        $request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());

        $initialData = [
            'amount' => '6.10',
            'description' => 'This is 6 euros and 10 cents.',
            'returnUrl' => 'http://example.com/this-is-a-success',
            'cancelUrl' => 'http://example.com/this-is-a-fail',
            'senderBankCode' => 'thisIsABankCode',
        ];

        $request->initialize($initialData);

        $data = $request->getData();

        $this->assertEquals($initialData['returnUrl'], $data['user_variable_0']);
        $this->assertEquals($initialData['cancelUrl'], $data['user_variable_1']);
        $this->assertEquals($initialData['senderBankCode'], $data['sender_bank_code']);
        $this->assertEquals($initialData['amount'], $data['amount']);
    }

    public function testGetDataInTestMode()
    {
        $request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());

        $initialData = [
            'amount' => '6.10',
            'description' => 'This is 6 euros and 10 cents.',
            'returnUrl' => 'http://example.com/this-is-a-success',
            'cancelUrl' => 'http://example.com/this-is-a-fail',
            'senderBankCode' => 'thisIsABankCode',
            'testMode' => true,
        ];

        $request->initialize($initialData);

        $data = $request->getData();

        // In test mode, 1.00 EUR is used to simulate a successful payment.
        $this->assertEquals('1.00', $data['amount']);
    }
}
