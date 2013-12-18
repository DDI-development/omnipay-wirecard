<?php

namespace Omnipay\Wirecard\Message;

use Omnipay\Tests\TestCase;

class DataStorageRequestTest extends TestCase
{
    public function setUp()
    {
        $this->request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(
        		array(
        				'customerId' 				=> 'D200001',
        				'secret' 					=> 'B8AKTPWBRMNBV455FG6M2DANE99WU2',
        				'paymentType' 				=> 'CCARD',
        				'shopId'     				=> 'qmore',
        				'orderIdent' 				=> 'LDSCQDKA1H',
        				'returnUrl' 				=>  'http://wirecard.local:80/frontend/fallback_return.php',
        				'language'  				=>  'en',
        				'cardholdername'	 		=> 'CName',
        				'pan'       				=>  '9500000000000001',
        				'expirationMonth' 			=> '12',
        				'expirationYear' 			=> '2031',
        				'cardverifycode' 			=> '123',
        				'amount'       				=> '20.00',
        				'currency'       			=> 'USD',
        				'orderDescription' 			=> 'test payment in USD',
        				'successUrl'  				=> 'http://success.com',
        				'failureUrl'  				=> 'http://failure.com',
        				'cancelUrl'  				=> 'http://cancel.com',
        				'serviceUrl'  				=> 'http://service.com',
        				'confirmUrl'  				=> 'http://confirm.com',
        				'consumerIpAddress'  		=> '127.0.0.1',
        				'consumerUserAgent'  		=> 'Mozilla',
        				'bankCountry'       		=> 'at',
        				'bankAccount'       		=> '12345678901',
        				//'bankNumber'       		=> '99000001',
        				'payerPayboxNumber' 		=> '0123456789',
        				'username' 					=> 'jane.doe',
        				'financialInstitution' 		=> 'MC',
        		)
        );
    }
    
    public function testDataWithPaymentType()
    {
    	$this->request->setPaymentType('ELV');
    	$this->request->setBankNumber('44544');
    	$data = $this->request->getData();
    	$this->assertSame('ELV', $data['paymentType']);
    }
    
    public function testDataWithCurrency()
    {    	
    	$this->request->setCurrency('EUR');
    	$data = $this->request->getData();
    	$this->assertSame('EUR', $data['currency']);
    }  
    
    public function testCreateDataStorageSuccess(){
    	$data = $this->request->getData();    	
    }
    
    public function testCreateDataStorageError(){
    	$this->request->setLanguage('english');
    	$data = $this->request->getData();
    }    
}
