<?php

/**
 * Moneris Response.
 */
namespace Omnipay\Moneris\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Moneris Response.
 *
 * This is the response class for all Moneris requests.
 *
 * @see \Omnipay\Moneris\Gateway
 */
class Response extends AbstractResponse
{
    /**
     * Is the transaction successful?
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return ! empty($this->data->responseData['ResponseCode'])
                && $this->data->responseData['ResponseCode'] !== 'null'
                && intval($this->data->responseData['ResponseCode']) < 50;
    }


    /**
     * Get the transaction reference.
     *
     * @return string|null
     */
    public function getTransactionReference()
    {
        if (isset($this->data->responseData) && $this->data->responseData['Complete'] && $this->data->responseData['Complete'] !== 'false') {
            return json_encode(array(
                'order_id'   => $this->data->responseData['ReceiptId'],
                'txn_number'   => $this->data->responseData['TransID']
            ));
        }

        // Error
        if (
            isset($this->data->responseData['ResponseCode'])
            &&
            (intval($this->data->responseData['ResponseCode']) >= 50 || $this->data->responseData['ResponseCode'] === 'null')

        ) {
            return $this->data->responseData['ResponseCode'];
        }

        return null;
    }

    /**
     * Get the card data from the response.
     *
     * @return array|null
     */
    public function getCard()
    {
        if (isset($this->data->resolveData)) {
            return $this->data->resolveData;
        }

        return null;
    }

    /**
     * Get the card data from the response of purchaseRequest.
     *
     * @return array|null
     */
    public function getData()
    {
        if (isset($this->data->responseData)) {
            return $this->data->responseData;
        }

        return null;
    }


    /**
     * Get the error message from the response.
     *
     * Returns null if the request was successful.
     *
     * @return string|null
     */
    public function getMessage()
    {
        if (!$this->isSuccessful()) {
            //return $this->data->responseData['Message'];
            // Returns response code (for translation purpose)
            return $this->data->responseData['ResponseCode'];
        }

        return null;
    }

    /**
     * Get the error message from the response.
     *
     * Returns null if the request was successful.
     *
     * @return string|null
     */
    public function getCode()
    {
        if (isset($this->data->responseData['ResponseCode'])) {
            return $this->data->responseData['ResponseCode'];
        }

        return null;
    }
}
