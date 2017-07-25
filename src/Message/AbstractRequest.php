<?php

namespace Omnipay\Moneris\Message;

require_once __DIR__ . "/../mpgClasses.php";

/**
 * Moneris Abstract Request.
 */

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    public function sendData($data)
    {
        $store_id = $data['store_id'];
        $api_token = $data['api_token'];

        $mpgTxn = new \mpgTransaction($data);

        $mpgRequest = new \mpgRequest($mpgTxn);
        $mpgRequest->setProcCountryCode("CA");
        $mpgRequest->setTestMode((bool)$data['test_mode']);

        $mpgHttpPost = new \mpgHttpsPost($store_id, $api_token, $mpgRequest);

        $mpgResponse = $mpgHttpPost->getMpgResponse();

        return $this->response = new Response($this, $mpgResponse);
    }
}
