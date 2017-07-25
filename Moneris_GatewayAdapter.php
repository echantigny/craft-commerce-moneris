<?php
namespace Commerce\Gateways\Omnipay;

use Commerce\Gateways\BaseGatewayAdapter;
use Craft\BaseModel;
use Omnipay\Common\Message\AbstractRequest as OmnipayRequest;

class Moneris_GatewayAdapter extends BaseGatewayAdapter
{
    public function handle()
    {
        return "Moneris";
    }

    public function getPaymentFormModel()
	{
		return new \Omnipay\Moneris\MonerisPaymentFormModel();
	}

    /**
	 * @param OmnipayRequest $request
	 * @param BaseModel      $paymentForm
	 *
	 * @return void
	 */
	public function populateRequest(OmnipayRequest $request, BaseModel $paymentForm)
	{
		if ($paymentForm->token)
		{
			$request->setToken($paymentForm->token);
		}
	}
}
