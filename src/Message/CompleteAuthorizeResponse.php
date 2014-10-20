<?php

namespace Bamarni\Omnipay\Ideal\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class CompleteAuthorizeResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return true;
    }

    public function getTransactionReference()
    {
        return uniqid('ideal_');
    }
}
