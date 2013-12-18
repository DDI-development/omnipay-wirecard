<?php

namespace Omnipay\Wirecard\Message;


/**
 * Wirecard DataStorage Request
 */
class DataStorageRequest extends AbstractRequest
{
	
	protected $dataStorageEndpoint = 'https://checkout.wirecard.com/seamless/dataStorage';
	
    public function getData()
    {
    	$this->validate('customerId','paymentType','shopId');
    	$paymentType = $this->getPaymentType();
    	
    	if($paymentType == CCARD || $paymentType == ELV || $paymentType == PBX || $paymentType == C2P  || $paymentType == GIROPAY){
    		$this->validate('cardholdername');
	    	try{
    			$this->createDataStorage();
    			$data['storageId'] = $this->getStorageId();
    			$data['orderIdent'] = $this->getOrderIdent();
	    	}
	    	catch (\Exception $e)
	    	{
	    		throw $e;
	    	}	
    	}
    	
    	$data['shopId'] = $this->getShopId();
    	$data['customerId'] = $this->getCustomerId();
    	$data['paymentType'] = $this->getPaymentType();
    	   	
    	return $data;
    }
    
    public function createDataStorage()
    {
    	try {
    		$this->initDataStorage();//throw exeption try catch
    		$this->saveSensitiveData();
    	}
    	catch (\Exception $e)
    	{
    		throw $e;
    	}
    }
    
    public function initDataStorage()
    {
    	$data = array();
    	
    	$data['customerId'] = $this->getCustomerId();
    	$data['shopId'] = $this->getShopId();
    	$data['orderIdent'] = $this->getOrderIdent();
    	$data['returnUrl'] = $this->getReturnUrl();
    	$data['language'] = $this->getLanguage();
    	$data['requestFingerprint'] = $this->getDataStorageFingerprint();
    	
    	$httpResponse = $this->httpClient->createRequest($this->getHttpMethod(), $this->getInitEndpoint(), null, $data)->send()->getBody(true);
    	$responseParams = $this->convertResponseParams($httpResponse);
    	
    	if(!empty($responseParams['error']))
    	{
    		throw new \Exception($responseParams['error']['message']);
    	}
			$storageId = $responseParams['success']['storageId'];
			$this->setStorageId($storageId);
			return true;
    }
    
    public function saveSensitiveData()
    {
    	$data = array();
    	$data = $this->getParameters();
    	unset($data['secret']);

    	$httpResponse = $this->httpClient->createRequest($this->getHttpMethod(), $this->getSaveEndpoint(), null, $data)->send()->getBody(true);    	
    	$responseParams = $this->getRequestResponse($httpResponse);
    
    	if(isset($responseParams['error']))
    	{
    		throw new \Exception($responseParams['error']['message']);
    	}    	
    	
    	return true;
    }
    
    public function getInitEndpoint()
    {
    	return $this->dataStorageEndpoint.'/init';
    }
    
    public function getSaveEndpoint()
    {
    	return $this->dataStorageEndpoint.'/store?format=json';
    }
    
    public function getEndpoint()
    {
    	return $this->endpoint;
    }
}
