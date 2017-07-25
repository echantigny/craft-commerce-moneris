<?php

/**
 * Moneris Purchase Request.
 */
namespace Omnipay\Moneris\Message;

class PurchaseRequest extends AuthorizeRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['type'] = 'res_purchase_cc';

        return $data;
    }
}
