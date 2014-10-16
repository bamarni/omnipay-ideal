<?php

namespace Bamarni\Omnipay\Ideal;

trait Parameters
{
    public function setUserId($value)
    {
        $this->setParameter('userId', $value);
    }

    public function getUserId()
    {
        return $this->getParameter('userId');
    }

    public function setProjectId($value)
    {
        $this->setParameter('projectId', $value);
    }

    public function getProjectId()
    {
        return $this->getParameter('projectId');
    }

    public function setProjectPassword($value)
    {
        $this->setParameter('projectPassword', $value);
    }

    public function getProjectPassword()
    {
        return $this->getParameter('projectPassword');
    }

    public function setSenderCountryId($value)
    {
        $this->setParameter('senderCountryId', $value);
    }

    public function getSenderCountryId()
    {
        return $this->getParameter('senderCountryId');
    }

    public function setApiKey($value)
    {
        $this->setParameter('apiKey', $value);
    }

    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }
}