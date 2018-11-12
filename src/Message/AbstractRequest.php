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
        return $this->getParameter('orderid');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('orderid', $value);
    }

    public function getRedirect()
    {
        return urlencode($this->getParameter('redirect'));
    }

    public function setRedirect($value)
    {
        return $this->setParameter('redirect', $value);
    }

    protected function getHttpMethod()
    {
        return 'POST';
    }

    protected $currentTime = null;
    public function getTime()
    {
        if(is_null($this->currentTime))
            $this->currentTime = time();
        return $this->currentTime;
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getCcNumber()
    {
        return $this->getParameter('ccnumber');
    }

    public function setCcNumber($value)
    {
        return $this->setParameter('ccnumber', $value);
    }

    public function getCcExp()
    {
        return $this->getParameter('ccexp');
    }

    public function setCcExp($value)
    {
        return $this->setParameter('ccexp', $value);
    }

    public function getCheckName()
    {
        return $this->getParameter('checkname');
    }

    public function setCheckName($value)
    {
        return $this->setParameter('checkname', $value);
    }

    public function getCheckAba()
    {
        return $this->getParameter('checkaba');
    }

    public function setCheckAba($value)
    {
        return $this->setParameter('checkaba', $value);
    }

    public function getCheckAccount()
    {
        return $this->getParameter('checkaccount');
    }

    public function setCheckAccount($value)
    {
        return $this->setParameter('checkaccount', $value);
    }

    public function getAccountHolderType()
    {
        return $this->getParameter('account_holder_type');
    }

    public function setAccountHolderType($value)
    {
        return $this->setParameter('account_holder_type', $value);
    }

    public function getAccountType()
    {
        return $this->getParameter('account_type');
    }

    public function setAccountType($value)
    {
        return $this->setParameter('account_type', $value);
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

    public function getOrderDescription()
    {
        return $this->getParameter('orderdescription');
    }

    public function setOrderDescription($value)
    {
        return $this->setParameter('orderdescription', $value);
    }

    public function getPayment()
    {
        return $this->getParameter('payment');
    }

    public function setPayment($value)
    {
        return $this->setParameter('payment', $value);
    }

    public function getIpAddress()
    {
        return $this->getParameter('ipaddress');
    }

    public function setIpAddress($value)
    {
        return $this->setParameter('ipaddress', $value);
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
        return $this->getParameter('ponumber');
    }

    public function setPonNumber($value)
    {
        return $this->setParameter('ponumber', $value);
    }

    public function getFirstName()
    {
        return $this->getParameter('firstname');
    }

    public function setFirstName($value)
    {
        return $this->setParameter('firstname', $value);
    }

    public function getLastName()
    {
        return $this->getParameter('lastname');
    }

    public function setLastName($value)
    {
        return $this->setParameter('lastname', $value);
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
        return $this->getParameter('shipping_firstname');
    }

    public function setShippingFirstName($value)
    {
        return $this->setParameter('shipping_firstname', $value);
    }

    public function getShippingLastName()
    {
        return $this->getParameter('shipping_lastname');
    }

    public function setShippingLastName($value)
    {
        return $this->setParameter('shipping_lastname', $value);
    }

    public function getShippingCompany()
    {
        return $this->getParameter('shipping_company');
    }

    public function setShippingCompany($value)
    {
        return $this->setParameter('shipping_company', $value);
    }

    public function getShippingAddress1()
    {
        return $this->getParameter('shipping_address1');
    }

    public function setShippingAddress1($value)
    {
        return $this->setParameter('shipping_address1', $value);
    }

    public function getShippingAddress2()
    {
        return $this->getParameter('shipping_address2');
    }

    public function setShippingAddress2($value)
    {
        return $this->setParameter('shipping_address2', $value);
    }

    public function getShippingCity()
    {
        return $this->getParameter('shipping_city');
    }

    public function setShippingCity($value)
    {
        return $this->setParameter('shipping_city', $value);
    }

    public function getShippingState()
    {
        return $this->getParameter('shipping_state');
    }

    public function setShippingState($value)
    {
        return $this->setParameter('shipping_state', $value);
    }

    public function getShippingZip()
    {
        return $this->getParameter('shipping_zip');
    }

    public function setShippingZip($value)
    {
        return $this->setParameter('shipping_zip', $value);
    }

    public function getShippingCountry()
    {
        return $this->getParameter('shipping_country');
    }

    public function setShippingCountry($value)
    {
        return $this->setParameter('shipping_country', $value);
    }

    public function getShippingEmail()
    {
        return $this->getParameter('shipping_email');
    }

    public function setShippingEmail($value)
    {
        return $this->setParameter('shipping_email', $value);
    }

    public function setTrackingNumber($value)
    {
        return $this->setParameter('trackingNumber', $value);
    }

    public function getTrackingNumber()
    {
        return $this->getParameter('trackingNumber');
    }
    public function setCarrier($value)
    {
        return $this->setParameter('carrier', $value);
    }

    public function getCarrier()
    {
        return $this->getParameter('carrier');
    }


    public function getHash()
    {
        $hashParams = array(
            $this->getOrderId(),
            $this->getAmount(),
            $this->getTime(),
            $this->getKey()
        );
        $string = implode("|", $hashParams);
        $hash = md5($string);
        return $hash;
    }

    public function sendData($data)
    {
        $body = $data ? $data : null;
        $httpRequest = $this->httpClient->request($this->getHttpMethod(), $this->getEndpoint(), ['Content-Type' => 'application/x-www-form-urlencoded'], http_build_query($data));
        $result = $httpRequest->getBody()->getContents();
        return new TransactionResponse($this, $result);
    }

    protected function createResponse($data)
    {
        return $this->response = new TransactionResponse($this, $data);
    }

}