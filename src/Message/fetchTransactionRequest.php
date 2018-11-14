<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 10:56 PM
 */

namespace Omnipay\Credomatic\Message;

use GuzzleHttp\Exception\BadResponseException;

class fetchTransactionRequest extends AbstractRequest
{
    /**
     * @return array|mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate(
            'key',
            'key_id'
        );

        return $this->validateHash($this->getParameters());
    }

    /**
     * @param $data
     *
     * @return null|\Omnipay\Common\Message\ResponseInterface|HashResponse|TransactionResponse|\Psr\Http\Message\ResponseInterface
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function sendData($data){
        return new TransactionResponse($this, $data);
    }

    public function validateHash($data){
        if(isset($_GET['hash'])){
            $hash = $_GET['hash'];
            $keys = explode('|', $hash);
            $md5Received = array_pop($keys); // lose md5 value
            $toHash = [];
            foreach($keys as $key){
                $toHash[$key] = $_GET[$key] ?? '';
            }
            $newHashValue = $this->createQuickClickHash($toHash);
            $newKeys = explode('|', $newHashValue);
            $md5Should = array_pop($newKeys); // lose md5 value

            if($md5Received !== $md5Should)
                return []; // clear all, data is compromised
        }
        return $data;
    }
}