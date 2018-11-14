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
            'amount',
            'transactionid',
            'key_id',
            'redirect'
        );

        return [
            'type' => 'refund',
            'transactionid' => $this->getTransactionId(),
            'amount' => $this->getAmount(),
            'carrier' => $this->getCarrier(),
            'key_id' => $this->getKeyId(),
            'hash' => $this->createHash(),
            'time' => $this->getTime(),
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
        return parent::sendData($data);
    }

}