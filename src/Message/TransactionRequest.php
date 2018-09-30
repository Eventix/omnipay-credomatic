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
            'ccNumber',
            'ccExp',
            'checkName',
            'checkAba',
            'checkAccount',
            'accountHolderType',
            'accountType',
            'amount'
        );

        return [
            'ccnumber' => $this->getCcNumber(),
            'ccexp' => $this->getCcExp(),
            'checkaccount' => $this->getCheckAccount(),
            'account_holder_type' => $this->getAccountHolderType(),
            'account_type' => $this->getAccountType(),
            'amount' => $this->getAmount(),
            'cvv' => $this->getCvv(),
            'product_sku_#' => $this->getProfuctSkuNo(),
            'payment' => $this->getPaymnt(),
            'orderdescription' => $this->getOrderDescription(),
            'ipaddress' => $this->getIpAddress(),
            'tax' => $this->getTax(),
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
            'shipping_email' => $this->getShippingEmail()
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
        $params = array(
            $this->getOrderId(),
            $this->getAmount(),
            $this->getTime(),
            $this->getKey()
        );
        $hashCode = $this->getHash($params);
        $hash_data = array(
            'key_id' => $this->getKeyId(),
            'hash' => $hashCode
        );
        try {
            $hashResponse = $this->httpClient->request('POST', $this->getEndpoint(), [], http_build_query($hash_data));
        } catch (BadResponseException $e) {
            $hashResponse = $e->getResponse();
        }
        $hashResponse = $hashResponse->getBody()->getContents();
        $response = new HashResponse($this, $hashResponse);

        if ($response->isSuccessful()) {
            $params = array(
                $response->getOrderId(),
                $this->getAmount(),
                $response->getResponse(),
                $response->getTransactionId(),
                $response->getAvsResponse(),
                $response->getCvvResponse(),
                $this->getTime(),
                $this->getKey()
            );

            $data['key_id'] = $this->getKeyId();
            $data['hash'] = $this->getHash($params);
            $data['time'] = $this->getTime();
            $data['redirect'] = $this->getRedirect();
            $data['type'] = $this->getType();
            try {
                $response = $this->httpClient->request('POST', $this->getEndpoint(), [], http_build_query($data));
            } catch (BadResponseException $e) {
                $response = $e->getResponse();
            }

            $result = $response->getBody()->getContents();
            return new TransactionResponse($this, $result);
        } else {
            return $response;
        }

    }
}