<?php

namespace Omnipay\Wirecard\Message;

/**
 * Wirecard Abstract Request
 */
use Guzzle\Common\Exception\ExceptionCollection;

define('CCARD', 'CCARD');
define('PBX', 'PBX');
define('C2P', 'C2P');//doesn`t work
define('ELV', 'ELV');
define('GIROPAY', 'GIROPAY');

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $endpoint = 'https://checkout.wirecard.com/seamless/frontend/init';
    
    
    public function setEndpoint($value)
    {
    	$this->endpoint = $value;
    }

    public function getCustomerId()
    {
    	return $this->getParameter('customerId');
    }
    
    public function setCustomerId($value)
    {
    	return $this->setParameter('customerId', $value);
    }
    
    public function getSecret()
    {
    	return $this->getParameter('secret');
    }
    
    public function setSecret($value)
    {
    	return $this->setParameter('secret', $value);
    }
    
    public function getCurrency()
    {
    	return $this->getParameter('currency');
    }
    
    public function setCurrency($value)
    {
    	return $this->setParameter('currency', $value);
    }
    
    public function getOrderDescription()
    {
    	return $this->getParameter('orderDescription');
    }
    
    public function setOrderDescription($value)
    {
    	return $this->setParameter('orderDescription', $value);
    }
    
    public function getPayerPayboxNumber()
    {
    	return $this->getParameter('payerPayboxNumber');
    }
    
    public function setPayerPayboxNumber($value)
    {
    	return $this->setParameter('payerPayboxNumber', $value);
    }
    
    public function getSuccessUrl()
    {
    	return $this->getParameter('successUrl');
    }
    
    public function setSuccessUrl($value)
    {
    	return $this->setParameter('successUrl', $value);
    }
    
    public function getServiceUrl()
    {
    	return $this->getParameter('serviceUrl');
    }
    
    public function setServiceUrl($value)
    {
    	return $this->setParameter('serviceUrl', $value);
    }
    
    public function getConfirmUrl()
    {
    	return $this->getParameter('confirmUrl');
    }
    
    public function setConfirmUrl($value)
    {
    	return $this->setParameter('confirmUrl', $value);
    }
    
    public function getPendingUrl()
    {
    	return $this->getParameter('pendingUrl');
    }
    
    public function setPendingUrl($value)
    {
    	return $this->setParameter('pendingUrl', $value);
    }
    
    public function getConsumerIpAddress()
    {
    	return $this->getParameter('consumerIpAddress');
    }
    
    public function setConsumerIpAddress($value)
    {
    	return $this->setParameter('consumerIpAddress', $value);
    }
    
    public function getConsumerUserAgent()
    {
    	return $this->getParameter('consumerUserAgent');
    }
    
    public function setConsumerUserAgent($value)
    {
    	return $this->setParameter('consumerUserAgent', $value);
    }
    
    public function getFailureUrl()
    {
    	return $this->getParameter('failureUrl');
    }
    
    public function setFailureUrl($value)
    {
    	return $this->setParameter('failureUrl', $value);
    }
    
    public function getStorageId()
    {
    	return $this->getParameter('storageId');
    }
    
    public function setStorageId($value)
    {
    	return $this->setParameter('storageId', $value);
    }
    
    public function getPaymentType()
    {
    	return $this->getParameter('paymentType');
    }
    
    public function setPaymentType($value)
    {
    	return $this->setParameter('paymentType', $value);
    }
    
    public function getPan()
    {
    	return $this->getParameter('pan');
    }
    
    public function setPan($value)
    {
    	return $this->setParameter('pan', $value);
    }
    
    public function getCardHolderName()
    {
    	return $this->getParameter('cardholdername');
    }
    
    public function setCardHolderName($value)
    {
    	return $this->setParameter('cardholdername', $value);
    }
    
    public function getExpirationMonth()
    {
    	return $this->getParameter('expirationMonth');
    }
    
    public function setExpirationMonth($value)
    {
    	return $this->setParameter('expirationMonth', $value);
    }
    
    public function getExpirationYear()
    {
    	return $this->getParameter('expirationYear');
    }
    
    public function setExpirationYear($value)
    {
    	return $this->setParameter('expirationYear', $value);
    }
    
    public function getCardVerifyCode()
    {
    	return $this->getParameter('cardverifycode');
    }
    
    public function setCardVerifyCode($value)
    {
    	return $this->setParameter('cardverifycode', $value);
    }
    
    public function getShopId()
    {
    	return $this->getParameter('shopId');
    }
    
    public function setShopId($value)
    {
    	return $this->setParameter('shopId', $value);
    }
    
    public function getOrderIdent()
    {
    	return $this->getParameter('orderIdent');
    }
    
    public function setOrderIdent($value)
    {
    	return $this->setParameter('orderIdent', $value);
    }
    
    public function getBankCountry()
    {
    	return $this->getParameter('bankCountry');
    }
    
    public function setBankCountry($value)
    {
    	return $this->setParameter('bankCountry', $value);
    }
    
    public function getBankAccount()
    {
    	return $this->getParameter('bankAccount');
    }
    
    public function setBankAccount($value)
    {
    	return $this->setParameter('bankAccount', $value);
    }
    
    public function getFinancialInstitution()
    {    	
    	return $this->getParameter('financialInstitution');
    }
    
    public function setFinancialInstitution($value)
    {    	
    	return $this->setParameter('financialInstitution', $value);
    }
    
    public function getBankNumber()
    {
    	return $this->getParameter('bankNumber');
    }
    
    public function setBankNumber($value)
    {
    	return $this->setParameter('bankNumber', $value);
    }
    
    public function getUsername()
    {
    	return $this->getParameter('username');
    }
    
    public function setUsername($value)
    {
    	return $this->setParameter('username', $value);
    }
    
    public function getLanguage()
    {
    	return $this->getParameter('language');
    }
    
    public function setLanguage($value)
    {
    	return $this->setParameter('language', $value);
    }
    
    public function getHttpMethod()
    {
    	return 'POST';
    }
   
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->createRequest($this->getHttpMethod(), $this->getEndpoint(), null, $data)->send()->getBody(true);   
        $responseParams = $this->convertResponseParams($httpResponse);
        
        return $this->response = new Response($this,$responseParams);    	;
    }
    
    public function getDataStorageFingerprint()
    {
    	$requestFingerprintSeed = '';    	
    	$requestFingerprintSeed .= $customerId = $this->getCustomerId();
    	$requestFingerprintSeed .= (($this->getShopId() )) ? $shopId = $this->getShopId() : $shopId = '';
    	$requestFingerprintSeed .= $orderIdent = $this->getOrderIdent();
    	$requestFingerprintSeed .= $returnUrl = $this->getReturnUrl();
    	$requestFingerprintSeed .= $language = $this->getLanguage();
    	$requestFingerprintSeed .= $secret = $this->getSecret();
    	
    	return hash("sha512", $requestFingerprintSeed);
    }
    
    public function convertResponseParams($response)
    {
    	$dataResponse = array();
    	
    	foreach (explode('&', $response) as $keyvalue) {
    		$param = explode('=', $keyvalue);
    		if (strpos($param[0],'error') !== false){
    		$key = urldecode($param[0]);
	    		if (strpos($key,'message') !== false){
	    			$key = 'message';
	    			$value = urldecode($param[1]);	    			
	    			if(!array_key_exists('error',$dataResponse)){
	    				$dataResponse['error'] = array();
	    			}
	    			 
	    			$dataResponse['error'] += array($key => $value);
	    		}
	    		
    		continue;    			    			
    		}
    		else{
    			if (sizeof($param) == 2) {    				
    				$key = urldecode($param[0]);
    				$value = urldecode($param[1]);
    				if(!array_key_exists('success',$dataResponse)){
    					   $dataResponse['success'] = array();
    				}
    					
    				$dataResponse['success'] +=  array($key => $value);   
    			}
    		}
    	}
    	
    	return $dataResponse;
    }    
    
    
    public function getRequestResponse($response)
    {
    	$response =  json_decode($response,true);
		$data = array();
		      	
    	if(isset($response['error'])){
	    	foreach ($response['error'] as $key => $value ){
	    		$data['error'] = array('message'    => $value['message']);
	    	}	    		  
    	}
    	else {
    		$data['success'] = array('message' => 'success'); 
    	}
    	
    	return $data;   	
    }
}
