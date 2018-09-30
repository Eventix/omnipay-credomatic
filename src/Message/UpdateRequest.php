<?php
/**
 * Created by PhpStorm.
 * User: mane.grigoryan
 * Date: 01/10/2018
 * Time: 00:43
 */

namespace Omnipay\Credomatic\Message;
use GuzzleHttp\Exception\BadResponseException;


class UpdateRequest extends AbstractRequest
{
    /**
     * @return array|mixed
     */
    public function getData()
    {
        return [
            'tracking_number' => $this->getTrackingNumber(),
            'carrier'=>$this->getCarrier(),
            'type'=>$this->getType(),
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
            $data['Transactionid']=$response->getTransactionId();
            $data['tracking_number']=$this->getTrackingNumber();
            $data['carrier ']=$this->getCarrier();
            $data['orderid']=$response->getOrderId();

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