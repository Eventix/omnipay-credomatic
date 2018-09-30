<?php
/**
 * Created by PhpStorm.
 * User: mane.grigoryan
 * Date: 01/10/2018
 * Time: 00:32
 */

namespace Omnipay\Credomatic\Message;
use GuzzleHttp\Exception\BadResponseException;


class CaptureRequest extends AbstractRequest
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