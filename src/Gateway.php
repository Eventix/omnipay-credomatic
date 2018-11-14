<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 9:01 PM
 */

namespace Omnipay\Credomatic;

use Omnipay\Common\AbstractGateway;
use Omnipay\Credomatic\Message\fetchTransactionRequest;
use Omnipay\Credomatic\Message\TransactionRequest;
use Omnipay\Credomatic\Message\RefundRequest;
use Omnipay\Credomatic\Message\QuickClickTransactionRequest;

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return "Credomatic";
    }

    public function getDefaultParameters()
    {
        return array(
            'key_id' => null,
            'key' => null,
            'language' => 'en'
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

    public function setReturnUrl($value)
    {
        return $this->setParameter('url_finish', $value);
    }

    public function getAction()
    {
        return $this->getParameter('action');
    }

    public function setAction($value)
    {
        return $this->setParameter('action', $value);
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

    public function quickClick(array $parameters = array())
    {
        return $this->createRequest(QuickClickTransactionRequest::class, $parameters);
    }

    public function withdraw(array $parameters = array())
    {
        return $this->createRequest(RefundRequest::class, $parameters);
    }

    public function fetch(array $parameters = array())
    {
        return $this->createRequest(fetchTransactionRequest::class, $parameters);
    }




}