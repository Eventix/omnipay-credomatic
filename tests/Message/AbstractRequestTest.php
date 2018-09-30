<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 9:15 PM
 */

namespace Omnipay\Credomatic\Test\Message;

use Omnipay\Tests\TestCase;

use Omnipay\Credomatic\Message\AbstractRequest;

abstract class AbstractRequestTest extends TestCase
{
    /**
     * @var AbstractRequest
     */
    protected $request;

    protected function getDefaultParametersTest()
    {
        return array(
            'key_id' => '10316620',
            'key' => 'US4AA6JD43Qc89hSF33ytAe8f2zfx354',
            'type' => 'sale',
            'return' => ''
        );
    }

    public function testDefaultParameters()
    {
        $data = $this->request->getData();
        $this->assertSame('10316620', (string)$data->username);
        $this->assertSame('key', $this->request->getKey());
        $this->assertSame('key_id', $this->request->getKeyId());
    }

}