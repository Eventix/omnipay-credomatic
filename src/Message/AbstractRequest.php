<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 9:15 PM
 */

namespace Omnipay\Credomatic\Message;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

abstract class AbstractRequest extends BaseAbstractRequest
{
    protected $endpoint = "https://credomatic.compassmerchantsolutions.com/api/transact.php";

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

    public function getType()
    {
        return $this->getParameter('type');
    }

    public function setType($value)
    {
        return $this->setParameter('type', $value);
    }

    public function getOrderId()
    {
        return $this->getParameter('orderId');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('orderId', $value);
    }

    public function getRedirect()
    {
        return $this->getParameter('redirect');
    }

    public function setRedirect($value)
    {
        return $this->setParameter('redirect', $value);
    }

    protected function getHttpMethod()
    {
        return 'POST';
    }

    public function getTime()
    {
        return time();
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getCardNumber()
    {
        return $this->getParameter('cardNumber');
    }

    public function setCardNumber($value)
    {
        return $this->setParameter('cardNumber', $value);
    }

    public function getCcNumber()
    {
        return $this->getParameter('ccNumber');
    }

    public function setCcNumber($value)
    {
        return $this->setParameter('ccNumber', $value);
    }

    public function getCcExp()
    {
        return $this->getParameter('ccExp');
    }

    public function setCcExp($value)
    {
        return $this->setParameter('ccExp', $value);
    }

    public function getCheckName()
    {
        return $this->getParameter('checkName');
    }

    public function setCheckName($value)
    {
        return $this->setParameter('checkName', $value);
    }

    public function getCheckAba()
    {
        return $this->getParameter('checkAba');
    }

    public function setCheckAba($value)
    {
        return $this->setParameter('checkAba', $value);
    }

    public function getCheckAccount()
    {
        return $this->getParameter('checkAccount');
    }

    public function setCheckAccount($value)
    {
        return $this->setParameter('checkAccount', $value);
    }

    public function getAccountHolderType()
    {
        return $this->getParameter('accountHolderType');
    }

    public function setAccountHolderType($value)
    {
        return $this->setParameter('accountHolderType', $value);
    }

    public function getAccountType()
    {
        return $this->getParameter('accountType');
    }

    public function setAccountType($value)
    {
        return $this->setParameter('accountType', $value);
    }

    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }

    public function getCvv()
    {
        return $this->getParameter('cvv');
    }

    public function setCvv($value)
    {
        return $this->setParameter('cvv', $value);
    }

    public function getProfuctSkuNo()
    {
        return $this->getParameter('productSkuNo');
    }

    public function setProductSkuNo($value)
    {
        return $this->setParameter('productSkuNo', $value);
    }

    public function getOrderDescription()
    {
        return $this->getParameter('orderDescription');
    }

    public function setOrderDescription($value)
    {
        return $this->setParameter('orderDescription', $value);
    }

    public function getPaymnt()
    {
        return $this->getParameter('payment');
    }

    public function setPayment($value)
    {
        return $this->setParameter('payment', $value);
    }

    public function getIpAddress()
    {
        return $this->getParameter('ipAddress');
    }

    public function setIpAddress($value)
    {
        return $this->setParameter('ipAddress', $value);
    }

    public function getTax()
    {
        return $this->getParameter('tax');
    }

    public function setTax($value)
    {
        return $this->setParameter('tax', $value);
    }

    public function getShipping()
    {
        return $this->getParameter('shipping');
    }

    public function setShipping($value)
    {
        return $this->setParameter('shipping', $value);
    }

    public function getPonNumber()
    {
        return $this->getParameter('ponNumber');
    }

    public function setPonNumber($value)
    {
        return $this->setParameter('ponNumber', $value);
    }

    public function getFirstName()
    {
        return $this->getParameter('firstName');
    }

    public function setFirstName($value)
    {
        return $this->setParameter('firstName', $value);
    }

    public function getLastName()
    {
        return $this->getParameter('lastName');
    }

    public function setLastName($value)
    {
        return $this->setParameter('lastName', $value);
    }


    public function getCompany()
    {
        return $this->getParameter('company');
    }

    public function setCompany($value)
    {
        return $this->setParameter('company', $value);
    }

    public function getAddress1()
    {
        return $this->getParameter('address1');
    }

    public function setAddress1($value)
    {
        return $this->setParameter('address1', $value);
    }

    public function getAddress2()
    {
        return $this->getParameter('address2');
    }

    public function setAddress2($value)
    {
        return $this->setParameter('address2', $value);
    }

    public function getCity()
    {
        return $this->getParameter('city');
    }

    public function setCity($value)
    {
        return $this->setParameter('city', $value);
    }

    public function getState()
    {
        return $this->getParameter('state');
    }

    public function setState($value)
    {
        return $this->setParameter('state', $value);
    }

    public function getZip()
    {
        return $this->getParameter('zip');
    }

    public function setZip($value)
    {
        return $this->setParameter('zip', $value);
    }

    public function getCountry()
    {
        return $this->getParameter('country');
    }

    public function setCountry($value)
    {
        return $this->setParameter('country', $value);
    }

    public function getPhone()
    {
        return $this->getParameter('phone');
    }

    public function setPhone($value)
    {
        return $this->setParameter('phone', $value);
    }

    public function getFax()
    {
        return $this->getParameter('fax');
    }

    public function setFax($value)
    {
        return $this->setParameter('fax', $value);
    }

    public function getEmail()
    {
        return $this->getParameter('email');
    }

    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    public function getWebsite()
    {
        return $this->getParameter('website');
    }

    public function setWebsite($value)
    {
        return $this->setParameter('website', $value);
    }

    public function getShippingFirstName()
    {
        return $this->getParameter('shippingFirstName');
    }

    public function setShippingFirstName($value)
    {
        return $this->setParameter('shippingFirstName', $value);
    }

    public function getShippingLastName()
    {
        return $this->getParameter('shippingLastName');
    }

    public function setShippingLastName($value)
    {
        return $this->setParameter('shippingLastName', $value);
    }

    public function getShippingCompany()
    {
        return $this->getParameter('shippingCompany');
    }

    public function setShippingCompany($value)
    {
        return $this->setParameter('shippingCompany', $value);
    }

    public function getShippingAddress1()
    {
        return $this->getParameter('shippingAddress1');
    }

    public function setShippingAddress1($value)
    {
        return $this->setParameter('shippingAddress1', $value);
    }

    public function getShippingAddress2()
    {
        return $this->getParameter('shippingAddress2');
    }

    public function setShippingAddress2($value)
    {
        return $this->setParameter('shippingAddress2', $value);
    }

    public function getShippingCity()
    {
        return $this->getParameter('shippingCity');
    }

    public function setShippingCity($value)
    {
        return $this->setParameter('shippingCity', $value);
    }

    public function getShippingState()
    {
        return $this->getParameter('shippingState');
    }

    public function setShippingState($value)
    {
        return $this->setParameter('shippingState', $value);
    }

    public function getShippingZip()
    {
        return $this->getParameter('shippingZip');
    }

    public function setShippingZip($value)
    {
        return $this->setParameter('shippingZip', $value);
    }

    public function getShippingCountry()
    {
        return $this->getParameter('shippingCountry');
    }

    public function setShippingCountry($value)
    {
        return $this->setParameter('shippingCountry', $value);
    }

    public function getShippingEmail()
    {
        return $this->getParameter('shippingEmail');
    }

    public function setTrackingNumber($value)
    {
        return $this->setParameter('trackingNumber ', $value);
    }

    public function getTrackingNumber()
    {
        return $this->getParameter('trackingNumber ');
    }
    public function setCarrier($value)
    {
        return $this->setParameter('carrier', $value);
    }

    public function getCarrier()
    {
        return $this->getParameter('carrier');
    }


    protected function getHash($params)
    {
        $string = implode("|", $params);
        $hash = md5($string);
        return $hash;
    }

    public function sendData($data)
    {
        $body = $data ? $data : null;
        $httpRequest = $this->httpClient->request($this->getHttpMethod(), $this->getEndpoint(), null, $body);
        $result = $httpRequest->getBody()->getContents();
        return new TransactionResponse($this, $result);
    }

    protected function createResponse($data)
    {
        return $this->response = new TransactionResponse($this, $data);
    }

}