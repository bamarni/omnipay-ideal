<?php

namespace Bamarni\Omnipay\Ideal\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;
use Guzzle\Http\Message\Response as HttpResponse;

class FetchIssuersResponse extends AbstractResponse
{
    protected $isSuccessful;

    public function __construct(RequestInterface $request, HttpResponse $response)
    {
        parent::__construct($request, $response->xml());

        $this->isSuccessful = $response->isSuccessful();
    }

    public function isSuccessful()
    {
        return $this->isSuccessful;
    }

    public function getIssuers()
    {
        $issuers = array();

        foreach ($this->data->banks->bank as $bank) {
            $id = (string) $bank->code;
            $issuers[$id] = (string) $bank->name;
        }

        return $issuers;
    }
}
