<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 10:56 PM
 */

namespace Omnipay\Credomatic\Test\Message;

namespace Omnipay\Credomatic\Test\Message;

use Omnipay\Credomatic\Message\TransactionRequest;


class TransactionRequestTest extends AbstractRequestTest
{

    protected function getOptions()
    {
        return array_merge(
            $this->getDefaultParametersTest(),
            array(
                'orderid' => rand(0, 999999),
                'amount' => '12.00',
                'ccnumber' => '4111111111111111',
                'ccexp' => '1220',
                'checkname' => 'Test Name',
                'checkaba' => '123654',
                'checkaccount' => '1452368855',
                'accountholdertype' => 'personal',
                'accounttype' => 'checking'
            )
        );
    }

    public function setUp()
    {
        parent::setUp();
        $this->request = new TransactionRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize($this->getOptions());
    }

    public function testDefaultParametersData()
    {
        $data = $this->request->getData();
        $this->assertSame('10316620', (string)$data->username);
    }

    public function testTransactionData()
    {
        $request = $this->request->getData()->request;
        $this->assertSame('1', (string)$request->response_code);
        $this->assertSame('M', (string)$request->cvvresponse);
        $this->assertSame('X', (string)$request->avsresponse);


    }

}