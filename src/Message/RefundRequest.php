<?php

/**
 * Moneris Refund Request.
 */
namespace Omnipay\Moneris\Message;

class RefundRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('transactionReference', 'amount');
        $transactionInfo = json_decode($this->getTransactionReference(), true);

        $data = array(
            'type'               => 'refund',
            'order_id'           => $transactionInfo['order_id'],
            'txn_number'         => $transactionInfo['txn_number'],
            'amount'             => $this->getAmount(),
            'crypt_type'         => '7',
            'dynamic_descriptor' => $this->getDescription(),
            'test_mode'          => $this->getTestMode(),
            'store_id'           => \Craft\craft()->moneris->getStoreId(),
            'api_token'          => \Craft\craft()->moneris->getApiToken()
        );

        return $data;
    }
}
