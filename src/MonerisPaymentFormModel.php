<?php
namespace Omnipay\Moneris;

use \Commerce\Gateways\PaymentFormModels\BasePaymentFormModel;
use Craft\AttributeType;

class MonerisPaymentFormModel extends BasePaymentFormModel
{
	public function populateModelFromPost($post)
	{
		parent::populateModelFromPost($post);
		if (isset($post['monerisToken']))
		{
			$this->token = $post['monerisToken'];
		}
	}

	public function rules()
	{
		if (empty($this->token))
		{
			return parent::rules();
		}
		else
		{
			return [];
		}
	}

    /**
	 * @return array
	 */
	protected function defineAttributes()
	{
		return [
			'token' => AttributeType::String
		];
	}
}