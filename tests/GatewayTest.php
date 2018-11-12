<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/28/2018
 * Time: 11:11 PM
 */

namespace Omnipay\Credomatic\Test;

use Omnipay\Tests\GatewayTestCase;
use Omnipay\Credomatic\Gateway;


class GatewayTest extends GatewayTestCase
{

    /**
     * @var Gateway
     */
    protected $gateway;
    /**
     * @var array
     */
    protected $options;
    /**
     * @var array
     */
    protected $captureOptions;

    public function setUp()
    {
        parent::setUp();
        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
        $this->gateway->setKey('US4AA6JD43Qc89hSF33ytAe8f2zfx354');
        $this->gateway->setKeyId('10316620');
        $this->gateway->setType('sale');
        $this->gateway->setReturn('');

        $this->options = array(
            'orderid' => rand(0, 999999),
            'amount' => '12.00',
            'ccnumber' => '4111111111111111',
            'ccexp' => '1220',
            'checkname' => 'Test Name',
            'checkaba' => '123654',
            'checkaccount' => '1452368855',
            'accountholdertype' => 'personal',
            'accounttype' => 'checking'
        );
    }

    public function testTransactionSuccess()
    {
        $response = $this->gateway->transaction($this->options)->send();
        $this->assertTrue($response->isSuccessful());
    }

    public function testTransactionFailure()
    {
        $response = $this->gateway->transaction($this->options)->send();
        $this->assertFalse($response->isSuccessful());

    }

}