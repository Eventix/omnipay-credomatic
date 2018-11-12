<?php
/**
 * Created by PhpStorm.
 * User: mane.grigoryan
 * Date: 01/10/2018
 * Time: 00:38
 */

namespace Omnipay\Credomatic\Message;
use GuzzleHttp\Exception\BadResponseException;


class VoidRequest extends AbstractRequest
{
    /**
     * @return array|mixed
     */
    public function getData()
    {
        $this->validate(
            'transactionid',
            'key_id',
            'redirect'
        );

        return [
            'type' => 'void',
            'key_id' => $this->getKeyId(),
            'hash' => $this->getHash(),
            'transactionid' => $this->getTransactionId(),
            'time' => $this->getTime(),
            'redirect' => $this->getRedirect(),
        ];
    }

    /**
     * @param $data
     *
     * @return null|\Omnipay\Common\Message\ResponseInterface|TransactionResponse|\Psr\Http\Message\ResponseInterface
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function sendData($data)
    {
        return parent::sendData($data);
    }
}