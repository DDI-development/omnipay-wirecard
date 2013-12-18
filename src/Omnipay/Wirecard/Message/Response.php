<?php

namespace Omnipay\Wirecard\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;


/**
 * Wirecard Response
 */
class Response extends AbstractResponse implements RedirectResponseInterface
{	
	
    public function isSuccessful()
    {
        return !isset($this->data['error']) && !isset($this->data['success']['redirectUrl']);
    }    

    public function getMessage()
    {
        if (!$this->isSuccessful() && !$this->isRedirect()) {            
            return $this->data['error']['message'];        
        }
    }
    
    public function isRedirect()
    {
    	return isset($this->data['success']['redirectUrl']);
    }
    
    public function getRedirectUrl()
    {
    	if ($this->isRedirect()) {
    		return (string) $this->data['success']['redirectUrl'];
    	}
    }
    
    public function redirect()
    {
    	header("Location: " . $this->data['success']['redirectUrl']);    
    }
    
    public function getRedirectMethod()
    {
    	return 'GET';
    }
    
    public function getRedirectData()
    {
    	return null;
    }
}
