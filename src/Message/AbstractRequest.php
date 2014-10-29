<?php

namespace Bamarni\Omnipay\Ideal\Message;

use Bamarni\Omnipay\Ideal\Parameters;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    use Parameters;

    public function getData()
    {
        return null;
    }
}
