<?php

/**
 * Moneris Authorize Request.
 */
namespace Omnipay\Moneris\Message;

class AuthorizeRequest extends AbstractRequest
{
    /**
     * @return mixed
     */
    public function getReceiptEmail()
    {
        return $this->getParameter('receipt_email');
    }

    /**
     * @param mixed $email
     * @return $this
     */
    public function setReceiptEmail($email)
    {
        $this->setParameter('receipt_email', $email);

        return $this;
    }

    public function getData()
    {
        $this->validate('amount', 'currency');
        $data = array(
            'type'               => 'res_preauth_cc',
            'order_id'           => \Craft\craft()->moneris->getOrderIdPrefix().$this->getTransactionId(),
            'amount'             => $this->getAmount(),
            'crypt_type'         => '7',
            'dynamic_descriptor' => $this->getDescription(),
            'data_key'           => $this->getToken(),
            'test_mode'          => $this->getTestMode(),
            'store_id'           => \Craft\craft()->moneris->getStoreId(),
            'api_token'          => \Craft\craft()->moneris->getApiToken()
        );

        return $data;
    }
}
