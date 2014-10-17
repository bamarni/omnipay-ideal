<?php

namespace Bamarni\Omnipay\Ideal\Message;

class CompleteAuthorizeRequest extends AbstractRequest
{
    public function getData()
    {
        return null;
    }

    public function send()
    {
        return $this->response = new CompleteAuthorizeResponse($this, $this->getData());
    }
}
