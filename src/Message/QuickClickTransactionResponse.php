<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/27/2018
 * Time: 9:16 PM
 */

namespace Omnipay\Credomatic\Message;


use Omnipay\Common\Message\AbstractResponse;

class QuickClickTransactionResponse extends AbstractResponse
{

    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    public function getOrderId()
    {
        $data = $this->getData();
        if (isset($data['order_id'])) {
            return $data['order_id'];
        }
    }

    public function getTransactionReference()
    {
        $data = $this->getData();
        if (isset($data['transactionReference'])) {
            return $data['transactionReference'];
        }
    }

    public function getRedirectUrl()
    {
        $data = $this->getData();
        if (isset($data['redirectUrl'])) {
            return $data['redirectUrl'];
        }
    }

    public function getData()
    {
        return $this->data;
    }


}