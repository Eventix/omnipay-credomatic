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
                'orderId' => rand(0, 999999),
                'amount' => '12.00',
                'ccNumber' => '4111111111111111',
                'ccExp' => '1220',
                'checkName' => 'Test Name',
                'checkAba' => '123654',
                'checkAccount' => '1452368855',
                'accountHolderType' => 'personal',
                'accountType' => 'checking'
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