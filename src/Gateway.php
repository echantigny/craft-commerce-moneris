<?php

/**
 * Moneris Gateway.
 */
namespace Omnipay\Moneris;

use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{

    public function getName()
    {
        return 'Moneris';
    }

    /**
     * Get the gateway parameters.
     *
     * @return array
     */
    public function getDefaultParameters()
    {
       return array(
            'orderIdPrefix' => '',
            'profileId' => '',
            'storeId' => '',
            'apiToken' => '',
            'testProfileId' => '',
            'testStoreId' => '',
            'testApiToken' => '',
            'testMode' => true,
        );
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Moneris\Message\AuthorizeRequest', $parameters);
    }

    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Moneris\Message\CaptureRequest', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Moneris\Message\PurchaseRequest', $parameters);
    }

    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Moneris\Message\RefundRequest', $parameters);
    }

    public function void(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Moneris\Message\VoidRequest', $parameters);
    }
}
