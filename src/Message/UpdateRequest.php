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
        $this->validate(
            'transactionid',
            'key_id'
        );

        return [
            'transactionid' => $this->getTransactionId(),
            'tracking_number' => $this->getTrackingNumber(),
            'type' => 'update',
            'carrier' => $this->getCarrier(),
            'key_id' => $this->getKeyId(),
            'hash' => $this->getHash(),
            'time' => $this->getTime(),
            'orderid' => $this->getOrderId(),
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