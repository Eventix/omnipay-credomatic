<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 10:56 PM
 */

namespace Omnipay\Credomatic\Message;

use GuzzleHttp\Exception\BadResponseException;

class QuickClickTransactionRequest extends AbstractRequest
{
    protected $quickClickEndpoint = 'https://quickclick.com/cart/cart.php';

    /**
     * @return array|mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate(
            'key',
            'key_id',
            'amount',
            'orderid'
        );

        $this->setTransactionReference($this->getOrderId());

        return [
            'amount' => $this->getAmount(),
            'order_description' => $this->getOrderDescription(),
            'order_id' => $this->getOrderId(),
            'time' => $this->getTime(),
            'url_finish' => $this->getReturnUrl(),
            'key_id' => $this->getKeyId(),
            'action' => 'process_fixed',
            'language' => $this->getLanguage(),
        ];
    }

    /**
     * @param $data
     *
     * @return null|\Omnipay\Common\Message\ResponseInterface|HashResponse|TransactionResponse|\Psr\Http\Message\ResponseInterface
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function sendData($data){
        $data['hash'] = $this->createQuickClickHash($data);
        $data['redirectUrl'] = $this->quickClickEndpoint. '?' . http_build_query($data);
        $data['transactionReference'] = $this->getTransactionReference();
        return new QuickClickTransactionResponse($this, $data);
    }
}