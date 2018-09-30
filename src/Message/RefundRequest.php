<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/28/2018
 * Time: 12:48 AM
 */

namespace Omnipay\Credomatic\Message;

use GuzzleHttp\Exception\BadResponseException;


class RefundRequest extends AbstractRequest
{
    /**
     * @return array|mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate(
            'amount'
        );
        return [
            'amount' => $this->getAmount(),
            'transactionid' => $this->getTransactionId()
        ];
    }

    /**
     * @param $data
     *
     * @return \Omnipay\Common\Message\ResponseInterface|TransactionResponse
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
        $hashResponse = $this->httpClient->request('POST', $this->getEndpoint(), $hashCode);
        $response = new HashResponse($this, $hashResponse);

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
        $data['type'] = 'refund';
        $data['Transactionid']=$response->getTransactionId();

        try {
            $response = $this->httpClient->request('POST', $this->getEndpoint(), $data);
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
        }

        $result = $response->getBody()->getContents();
        return new TransactionResponse($this, $result);
    }

}