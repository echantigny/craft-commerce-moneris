<?php

/**
 * Moneris List Invoices Request.
 */
namespace Omnipay\Moneris\Message;

/**
 * Moneris List Invoices Request.
 *
 * @see Omnipay\Moneris\Gateway
 * @link https://stripe.com/docs/api#list_invoices
 */
class ListInvoicesRequest extends AbstractRequest
{
    public function getData()
    {
        $data = array();

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/invoices';
    }

    public function getHttpMethod()
    {
        return 'GET';
    }
}
