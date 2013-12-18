<?php

namespace Omnipay\Wirecard;

use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testDataStorage()
    {
        $request = $this->gateway->dataStorage(array('customerId' => 'D200001','paymentType' => 'CCARD'));

        $this->assertInstanceOf('Omnipay\Wirecard\Message\DataStorageRequest', $request);
        $this->assertSame('D200001', $request->getCustomerId(),'CCARD', $request->getPaymentType());
    }

    public function testPurchase()
    {
        $request = $this->gateway->purchase(array('amount' => '10.00'));

        $this->assertInstanceOf('Omnipay\Wirecard\Message\PurchaseRequest', $request);
        $this->assertSame('10.00', $request->getAmount());
    }

}
