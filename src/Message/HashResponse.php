<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/27/2018
 * Time: 11:04 PM
 */

namespace Omnipay\Credomatic\Message;

use Omnipay\Common\Message\AbstractResponse;

class HashResponse extends AbstractResponse
{
    public function getData()
    {
        $data = $this->data;

        $params = array(
            "response=",
            "responsetext=",
            "authcode=",
            "transactionid=",
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

    public function getResponse()
    {
        $data = $this->getData();

        if (isset($data['response'])) {
            return $data['response'];
        }
    }

    public function getAuthCode()
    {
        $data = $this->getData();

        if (isset($data['authcode'])) {
            return $data['authcode'];
        }
    }

    public function getTransactionId()
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

    public function getType()
    {
        $data = $this->getData();
        if (isset($data['type'])) {
            return $data['orderid'];
        }
    }

    public function getResponseCode()
    {
        $data = $this->getData();
        if (isset($data['response_code'])) {
            return $data['response_code'];
        }
    }

    public function getResponseText()
    {
        $data = $this->getData();
        if (isset($data['responsetext'])) {
            return $data['responsetext'];
        }
    }


}