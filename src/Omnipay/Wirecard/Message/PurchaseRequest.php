<?php
namespace Omnipay\Wirecard\Message;

/**
 * Wirecard Purchase Request
 */
class PurchaseRequest extends DataStorageRequest
{
    public function getData()
    {    
    	$this->validate('customerId','secret','paymentType','amount','currency');

        $data = parent::getData();
        
        $data['amount'] = $this->getAmount();
        $data['currency'] = $this->getCurrency();
        $data['language'] = $this->getLanguage();
        $data['orderDescription'] = $this->getOrderDescription();
        $data['successUrl'] = $this->getSuccessUrl();
        $data['failureUrl'] = $this->getFailureUrl();
        $data['cancelUrl'] = $this->getCancelUrl();
        $data['serviceUrl'] = $this->getServiceUrl();
        $data['pendingUrl'] = $this->getPendingUrl();
        $data['confirmUrl'] = $this->getConfirmUrl();
        $data['financialInstitution'] = $this->getFinancialInstitution();
        $data['bankCountry'] = $this->getBankCountry();
        $data['bankAccount'] = $this->getBankAccount();
        $data['bankNumber'] = $this->getBankNumber();
        $data['payerPayboxNumber'] = $this->getPayerPayboxNumber();
        $data['username'] = $this->getUsername();
        $data['consumerIpAddress'] = $this->getConsumerIpAddress();
        $data['consumerUserAgent'] = $this->getConsumerUserAgent();
        $data['requestFingerprintOrder'] = $this->getFingerprintOrder($data);
        $data['requestFingerprint'] = $this->getFingerprint($data);
        
        return $data;
    }
    
    public function getFingerprint($data) {
    	$fingerPrintSeed = '';
    	$fingerPrintSeed.=$this->getSecret();
    	
    	foreach ($data as $key => $value)
    	{
    		$fingerPrintSeed .= $value;  
    	}
 
    	return hash('sha512', $fingerPrintSeed);
    }
    
    public function getFingerprintOrder($data) {    	
    	$fingerPrintOrder = 'secret,';

    	foreach ($data as $key => $value)
    	{
    		$fingerPrintOrder .= $key.',';
    	}
    	
    	$fingerPrintOrder.= 'requestFingerprintOrder';
    	 
    	return $fingerPrintOrder;
    }
}
