<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 10:56 PM
 */

namespace Omnipay\Credomatic\Message;

use GuzzleHttp\Exception\BadResponseException;

class TransactionRequest extends AbstractRequest
{
    /**
     * @return array|mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate(
            'ccnumber',
            'ccexp',
            'amount',
            'orderid',
            'type'
        );

        return [
            'ccnumber' => $this->getCcNumber(),
            'ccexp' => $this->getCcExp(),
            'checkaccount' => $this->getCheckAccount(),
            'account_holder_type' => $this->getAccountHolderType(),
            'account_type' => $this->getAccountType(),
            'amount' => $this->getAmount(),
            'cvv' => $this->getCvv(),
            'payment' => $this->getPayment(),
            'orderdescription' => $this->getOrderDescription(),
            'orderid' => $this->getOrderId(),
            'ipaddress' => $this->getIpAddress(),
            'tax' => $this->getTax(),
            'time' => $this->getTime(),
            'type' => $this->getType(),
            'shipping' => $this->getShipping(),
            'ponnumber' => $this->getPonNumber(),
            'firstname' => $this->getFirstName(),
            'lastname' => $this->getLastName(),
            'company' => $this->getCompany(),
            'address1' => $this->getAddress1(),
            'address2' => $this->getAddress2(),
            'city' => $this->getCity(),
            'state' => $this->getState(),
            'zip' => $this->getZip(),
            'country' => $this->getCountry(),
            'phone' => $this->getPhone(),
            'fax' => $this->getFax(),
            'email' => $this->getEmail(),
            'website' => $this->getWebsite(),
            'shipping_firstname' => $this->getShippingFirstName(),
            'shipping_lastname' => $this->getShippingLastName(),
            'shipping_company' => $this->getShippingCompany(),
            'shipping_address1' => $this->getShippingAddress1(),
            'shipping_address2' => $this->getShippingAddress2(),
            'shipping_city' => $this->getShippingCity(),
            'shipping_state' => $this->getShippingState(),
            'shipping_zip' => $this->getShippingZip(),
            'shipping_country' => $this->getShippingEmail(),
            'shipping_email' => $this->getShippingEmail(),
            'hash' => $this->getHash(),
            'redirect' => $this->getRedirect(),
            'key_id' => $this->getKeyId(),
        ];
    }

    /**
     * @param $data
     *
     * @return null|\Omnipay\Common\Message\ResponseInterface|HashResponse|TransactionResponse|\Psr\Http\Message\ResponseInterface
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function sendData($data)
    {
        return parent::sendData($data);
    }
}