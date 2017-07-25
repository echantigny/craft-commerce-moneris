<?php

/**
 * Moneris Delete Customer Request.
 */
namespace Omnipay\Moneris\Message;

/**
 * Moneris Fetch Customer Request.
 *
 *
 * @link https://stripe.com/docs/api#retrieve_customer
 */
class FetchCustomerRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('customerReference');
        return;
    }

    public function getHttpMethod()
    {
        return 'GET';
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/customers/' . $this->getCustomerReference();
    }
}
