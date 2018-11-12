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
        $params = array(
            "response=",
            "responsetext=",
            "authcode=",
            "transactionid=",
            "hash=",
            "avs",
            "cvv",
            "orderid=",
            "type=",
            "response_code="
        );
        $string = str_replace($params, '', $data);
        $values = explode('&', $string);

        $result = array(
            "response" => $values[0],
            "responsetext" => $values[1],
            "authcode" => $values[2],
            "transactionid" => $values[3],
            "avsresponse" => $values[4],
            "cvvresponse" => $values[5],
            "orderid" => $values[6],
            "type" => $values[7],
            "response_code" => $values[8]
        );
        return $result;

    }


}