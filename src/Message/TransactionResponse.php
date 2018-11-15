<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/27/2018
 * Time: 9:16 PM
 */

namespace Omnipay\Credomatic\Message;


use Omnipay\Common\Message\AbstractResponse;

class TransactionResponse extends AbstractResponse
{

    public function isSuccessful()
    {
        $data = $this->getData();
        return isset($data['response']) && $data['response'] == '1';
    }

    public function isDeclined()
    {
        $data = $this->getData();
        return isset($data['response']) && $data['response'] == '2';
    }

    public function isCancelled()
    {
        $data = $this->getData();
        return isset($data['response']) && $data['response'] == '3';
    }


    public function getAuthCode()
    {
        $data = $this->getData();

        if (isset($data['authcode'])) {
            return $data['authcode'];
        }
    }

    public function getHash()
    {
        $data = $this->getData();

        if (isset($data["hash"])) {
            return $data['hash'];
        }
    }

    public function getTransactionId()
    {
        $data = $this->getData();

        if (isset($data['transactionid'])) {
            return $data['transactionid'];
        }
    }

    public function getTransactionReference()
    {
        $data = $this->getData();

        if (isset($data['transactionid'])) {
            return $data['transactionid'];
        }
    }

    public function getResponseCode(){
        $data = $this->getData();

        if (isset($data['response_code'])) {
            return $data['response_code'];
        }
    }

    public function getResponseText(){
        $data = $this->getData();

        if (isset($data['responsetext'])) {
            return $data['responsetext'];
        }
    }

    public function getMessage()
    {
        return $this->getResponseText();
    }

    public function getAvsResponse()
    {
        $data = $this->getData();

        if (isset($data['avsresponse'])) {
            return $data['avsresponse'];
        }
    }

    public function getCvvResponse()
    {
        $data = $this->getData();

        if (isset($data['cvvresponse'])) {
            return $data['cvvresponse'];
        }
    }

    public function getOrderId()
    {
        $data = $this->getData();
        if (isset($data['orderid'])) {
            return $data['orderid'];
        }
    }

    public function getResponseHash()
    {
        $data = $this->getData();
        if (isset($data['hash'])) {
            return $data['hash'];
        }
    }

    public function getUsername()
    {
        $data = $this->getData();
        if (isset($data['username'])) {
            return $data['username'];
        }
    }

    public function getTime()
    {
        $data = $this->getData();
        if (isset($data['time'])) {
            return $data['time'];
        }
    }

    public function getData()
    {
        $data = $this->data;
        return $data;

    }


}