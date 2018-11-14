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
            'amount',
            'key_id',
            'transactionid'
        );

        return [
            'type' => 'capture',
            'amount' => $this->getAmount(),
            'key_id' => $this->getKeyId(),
            'hash' => $this->createHash(),
            'redirect' => $this->getRedirect(),
            'transactionid' => $this->getTransactionId(),
            'time' => $this->getTime(),
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