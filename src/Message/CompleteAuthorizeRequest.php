<?php

namespace Bamarni\Omnipay\Ideal\Message;

class CompleteAuthorizeRequest extends AbstractRequest
{
    public function sendData($data)
    {
        return $this->response = new CompleteAuthorizeResponse($this, $this->getTransactionId());
    }
}
