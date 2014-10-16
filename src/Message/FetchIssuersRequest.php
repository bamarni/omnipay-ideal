<?php

namespace Bamarni\Omnipay\Ideal\Message;

class FetchIssuersRequest extends AbstractRequest
{
    public function getData()
    {
        return null;
    }

    public function send()
    {
        $client = $this->httpClient;

        $client->setDefaultOption('auth', array($this->getUserId(), $this->getApiKey(), 'Basic'));

        $response = $client->createRequest('post', 'https://www.sofort.com/payment/ideal/banks',
            [
                'headers' => [
                    'Content-Type' => 'application/xml; charset=UTF-8',
                    'Accept'       => 'application/xml; charset=UTF-8',
                ],
            ]
        )->send();

        return $this->response = new FetchIssuersResponse($this, $response);
    }
}
