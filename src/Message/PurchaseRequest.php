<?php

namespace Bamarni\Omnipay\Ideal\Message;

class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $data = [
            'user_id'           => $this->getUserId(),
            'project_id'        => $this->getProjectId(),
            'sender_bank_code'  => $this->getParameter('senderBankCode'),
            'sender_country_id' => $this->getSenderCountryId(),
            'amount'            => $this->getAmount(),
            'reason_1'          => $this->getDescription(),
            'user_variable_0'   => $this->getReturnUrl(),
            'user_variable_1'   => $this->getCancelUrl(),
            'hash'              => $this->computeHash(),
        ];

        return $data;
    }

    public function setSenderBankCode($value)
    {
        $this->setParameter('senderBankCode', $value);
    }

    public function getAmount()
    {
        // In test mode, a successful transaction is simulated by setting its amount to 1 EUR.
        if ($this->getTestMode()) {
            return '1.00';
        }

        return parent::getAmount();
    }

    public function send()
    {
        return $this->response = new PurchaseResponse($this, $this->getData());
    }

    private function computeHash()
    {
        $hash = implode(
            '|',
            array(
                $this->getUserId(),                       // user_id
                $this->getProjectId(),                    // project_id
                '',                                       // sender_holder
                '',                                       // sender_account_number
                $this->getParameter('senderBankCode'),    // sender_bank_code
                $this->getSenderCountryId(),              // sender_country_id
                $this->getAmount(),                       // amount
                $this->getDescription(),                  // reason_1
                '',                                       // reason_2
                $this->getReturnUrl(),                    // user_variable_0
                $this->getCancelUrl(),                    // user_variable_1
                '',                                       // user_variable_2
                '',                                       // user_variable_3
                '',                                       // user_variable_4
                '',                                       // user_variable_5
                $this->getProjectPassword()               // project_password
            )
        );

        return sha1($hash);
    }
}
