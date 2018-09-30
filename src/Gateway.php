<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 9:01 PM
 */

namespace Omnipay\Credomatic;

use Omnipay\Common\AbstractGateway;
use Omnipay\Credomatic\Message\TransactionRequest;
use Omnipay\Credomatic\Message\RefundRequest;

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return "Credomatic";
    }

    public function getDefaultParameters()
    {
        return array(
            'key_id' => '10316620',
            'key' => 'US4AA6JD43Qc89hSF33ytAe8f2zfx354',
            'testMode' => true,
            'return' => '',
            'type'
        );
    }

    public function getKeyId()
    {
        return $this->getParameter('key_id');
    }

    public function setKeyId($value)
    {
        return $this->setParameter('key_id', $value);
    }

    public function getKey()
    {
        return $this->getParameter('key');
    }

    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

    public function getReturn()
    {
        return $this->getParameter('return');
    }

    public function setReturn($value)
    {
        return $this->setParameter('return', $value);
    }

    public function getType()
    {
        return $this->getParameter('type');
    }

    public function setType($value)
    {
        return $this->setParameter('type', $value);
    }

    public function transaction(array $parameters = array())
    {
        return $this->createRequest(TransactionRequest::class, $parameters);
    }

    public function withdraw(array $parameters = array())
    {
        return $this->createRequest(RefundRequest::class, $parameters);
    }



}